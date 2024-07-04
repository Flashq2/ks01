<?php

namespace App\Http\Controllers;

use Exception;
use App\Jobs\JobAttemLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MainSystem\SmsService as GlobalSmsService;
use App\MainSystem\system as MainSystemSystem;
use App\Models\UserLoginHistory;
use Carbon\Carbon;
use PHPUnit\Event\Telemetry\System;

class LoginController extends Controller
    
{
    protected $sms_service = '' ;
    protected $system = '' ;

    function __construct()
    {
        $this->sms_service = new GlobalSmsService();
        $this->system = new MainSystemSystem();
    }
    public function index(){
        try{
            return view('admin.auth.pages-login');
        }catch(Exception $ex){
            return 'Something went wrong' ;
        }
    }
    public function doLogin(Request $request){
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
                $user_histroy->name = Auth::user()->name;
                $user_histroy->ip_address = '' ;
                $user_histroy->login_datetime = Carbon::now()->toDateTimeString() ;
                // $sms_result = $this->sendOTPcode($user) ;
                return redirect('/admin/dashboard');
                
            }
            // dispatch(new JobAttemLogin($criteria));
            return redirect()->back() ;

        }catch(Exception $ex){
            Auth::logout();
            return response()->json(['status' => 'warning' , 'msg' => $ex]) ;
        }
    }


    function sendOTPcode($user){
        $random_code = $this->system->randomOTPCode(6);
        // dd($random_code) ;
        $data = [
            'sender' => 'SMS Info',
            'content' => "Hello, $user->name \n Here is your verification code for our system \n Verification code : $random_code"
        ];
        $result = $this->sms_service->PostSMS($data,$user);
        return $result ;

    }
}
