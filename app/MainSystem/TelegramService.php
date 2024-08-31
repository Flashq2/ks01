<?php
namespace App\MainSystem;

use Illuminate\Support\Facades\Auth;

 class TelegramService{
    protected $telegram_id = '';
    protected $telegram_token = '' ;
    protected $account_token =   '' ;
    public $telegram_url = '';
    
    public function __construct(){
        $this->telegram_id = env('TELEGRAM_ERROR_ID');
        $this->account_token =  env('TELEGRAM_ERROR_TOKEN');
        $this->telegram_url = 'https://api.telegram.org' ;
       
    }

    /* 
        ======================== Use curl to post telegram service =================
        ======================== Do not change every line of code in this function ===============
        @param 
    */
    public static function sendMessage($param,$type='SMS',$data = '',$user = ''){
        $url = self::$telegram_url ;
        $text = '';
        $apiUri = sprintf('%s/bot%s/%s', self::$telegram_url, self::$account_token, 'sendMessage');
        $params = [
            'chat_id' => self::$telegram_id,
            'text' => $text
        ];

        $headers = [
            'Content-Type: application/json'
        ];
        self::initTelegramConnection($apiUri,$headers,$params);
    }

    /* 
        ======================== Use curl to post telegram service =================
        ======================== Do not change every line of code in this function ===============
        @param $apiUri String
        @param $heasders Array
        @param $params Array 
        -- Return Type: connection ----
    */
    function initTelegramConnection($apiUri,$headers,$params){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->telegram_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;

    }
    /* 
        ======================== Global Return message =================
        ======================== Return Type String ===============
        @param $data Array
        @param $type String
        @param $params Array 
        -- Return Type: connection ----
    */
    function message($data,$type){
        $type = trim($type);
        $arr_data = $data ;
        $msg_return = '' ;
        switch($type) {
            case 'Error' :
                $msg_return .= "Error Line Number: ".$arr_data->getLines();
                $msg_return .= "\nFrom User : ".Auth::user()->email;
                $msg_return .= "\nFrom Url : ".request()->path();
                $msg_return .= "\nFrom Page : $arr_data";
                $msg_return .= "\nError Message: $arr_data";
                break ;
            default :
                $msg_return = "Hello! This message send from E-S System \n Thank You .";
                
        }
        return $msg_return ;
    }

    function messageType(){

    }

}