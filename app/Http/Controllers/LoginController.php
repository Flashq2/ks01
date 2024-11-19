<?php

namespace App\Http\Controllers;

use Exception;
use App\Jobs\JobAttemLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MainSystem\SmsService as GlobalSmsService;
use App\MainSystem\system;
use App\Models\TwoFactorAuth;
use App\Models\UserLoginHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\MainSystem\TelegramService;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Mockery\Expectation;

class LoginController extends Controller
    
{
    protected $sms_service = '' ;
    public $system = '' ;
    protected $telegram_service = '' ;
    protected $verifiaction_code_page = '' ;

    function __construct()
    {
        $this->sms_service = new GlobalSmsService();
        $this->system = new system();
        $this->telegram_service = new TelegramService() ;
        $this->verifiaction_code_page = 'admin.auth.two_factor_auth';
    }
    public function index(){
        try{

            return view('admin.auth.pages-login');
        }catch(Exception $ex){
            return 'Something went wrong' ;
        }
    }
    public function doLogin(Request $request){
        DB::beginTransaction();
        try{
            $data = $request->all();
            $criteria = [
                'email' => $data['email'],
                'password' => $data['password']
            ];
            if(Auth::attempt($criteria)){ 
                $user = Auth::user() ;
                // Create user histroy for control send OTP ;
                $user_histroy = new UserLoginHistory();
                $user_histroy->email = Auth::user()->email;
                $user_histroy->user_name = Auth::user()->name;
                $user_histroy->ip_address = '' ;
                $user_histroy->login_datetime = Carbon::now()->toDateTimeString() ;
                $user_histroy->save() ;
                // Create Two Factor Auth 
                // if($user->two_factor == 'Yes'){
                //     $otp_result = 1111   ;
                //     // if($user->two_factor_type == 'SMS') $otp_result = $this->sendOTPcode($user) ;
                //     // else $otp_result = $this->sendOTPCodeToTelegram($user);
                    
                //     $two_factor = new TwoFactorAuth();
                //     // $two_factor->otp_code = $otp_result['random_code'] ;
                //     $two_factor->email = Auth::user()->email;
                //     $two_factor->provider = 'SMS info';
                //     $two_factor->request_datetime = Carbon::now()->toDateString();
                //     $two_factor->ending_datetime = Carbon::now()->toDateTimeString();
                //     $two_factor->save() ;
                //     DB::commit() ;
                //     $user_email = encryptHelper($user->emai);
                //     $password = encryptHelper($data['password']);
                //     $data = [
                //         'user_email' => $user_email,
                //         'password' => $password
                //     ];
                //     return view($this->verifiaction_code_page,$data);
                // }
                DB::commit() ;
                if(Auth::user()->role != 'User'){
                    return redirect('/');
                }
                return redirect('/admin/dashboard');
                
            }
            return back()->with('error', 'Something went wrong!');
            // dispatch(new JobAttemLogin($criteria));
            return redirect()->back() ;

        }catch(Exception $ex){
            Auth::logout();
            DB::rollback();
            return response()->json(['status' => 'warning' , 'msg' => $ex->getMessage()]) ;
        }
    }
        /* 
            ======================== Send Opt code to specifx phone numner of user login and user already setup  =================
            ======================== Do not change every line of code in this function ===============
            @param $user [Current user login]
        
            -- Return Type: Array of collection ----
        */

    function sendOTPcode($user){
        $random_code = $this->system::randomOTPCode(6);
        $data = [
            'sender' => 'SMS Info', // Any provide is we already resister, But i think it no need to change
            'content' => "Hello, $user->name \n Here is your verification code for our system \n Verification code : $random_code"
        ];
        $result = $this->sms_service::PostSMS($data,$user);
        
        return ['random_code' => $random_code,'result' => $result] ;

    }
    /* 
        ======================== Send Opt code to specifix telegram account of user login and user already setup  =================
        ======================== Do not change every line of code in this function ===============
        @param $user [Current user login]
     
        -- Return Type: Array of collection ----
    */
    function sendOTPCodeToTelegram ($user){
        $random_code = $this->system::randomOTPCode(6);
        $data = [
            'content' => "Hello, $user->name \n Here is your verification code for our system \n Verification code : $random_code",
        ];
        $result = $this->telegram_service::sendMessage($data,'SMS','',$user);
        return ['random_code' => $random_code,'result' => $result] ;
    }
    // Return Verification code ... [U can add some variable for return to client]  
    public function getOtpcode(Request $request){
        try{
            $data = $request->all() ;
            $view = 'admin.auth.two_factor_auth';
            return view($view);
        }catch(Exception $ex){
            return response()->json(['status' => 'successs','msg' => $ex->getMessage()]);
        }
    }
    // function encode(str) {
    //     const charMap = {
    //       '!': '%21',
    //       "'": '%27',
    //       '(': '%28',
    //       ')': '%29',
    //       '~': '%7E',
    //       '%20': '+',
    //       '%00': '\x00'
    //     };
    //     return encodeURIComponent(str).replace(/[!'()~]|%20|%00/g, function replacer(match) {
    //       return charMap[match];
    //     });
    public function verificationOTP(Request $request){
        try{
            $data = $request->all();
            $email =  decryptHelper($data['email']);
            $password = decryptHelper($data['password']);
            $criteria = [
                'email' => $email ,
                'password' => $password
            ];
            // ----- Testing [Test Case]
            if(Auth::once($criteria)){
                $verify_code = TwoFactorAuth::where('otp_code',$data['code'])->where('email',$email)->first() ;
                // if($verify_code) return respon
            }else{
                return response()->json(['status' => 'warning' ,'msg' => 'Something went wrong']);
            }
        }catch(Exception $ex){
            return response()->json(['status' => 'warning' ,'msg' => $ex->getMessage()]);
        }
    }

    public function logout(){
        Auth::logout();
        FacadesSession::flush();
        return redirect()->back();
    }
}
