<?php 
namespace App\MainSystem;
    class SmsService{
        protected $sms_private_key = '';
        protected $sms_x_secret = '' ;
        protected $account_token =   '' ;
        protected $post_sms_url = '';
        
        public function __construct(){
            $this->sms_private_key = env('SMS_PRIVATE_KEY');
            $this->sms_x_secret =  env('SMS_X_SECRET');
            $this->post_sms_url = 'https://cloudapi.plasgate.com/api/send?'.'private_key='.$this->sms_private_key ;
           
        }
        /* 
            ======================== Use curl to post SMS service =================
            ======================== Do not change every line of code in this function ===============
            @param $apiUri String
            @param $heasders Array
            @param $params Array 

        */
        public function PostSMS($user,$data){
            $sms_account_service = app_path('SMS/sms_service.json');
            $sms_service_content = file_get_contents($sms_account_service);
            $json_data = json_decode($sms_service_content) ;
            $params = array(
                'sender' => 'SMS Info',
                'to' => "85592390212",
                'content' => 'Pherk Ot',
                'username' => $json_data->account_email,
                'password' => $json_data->account_password,
            );
    
            $headers = [
                'Content-Type: application/json',
                'X-Secret' => $this->sms_x_secret
            ];
            $result = $this->initSMSConnection($this->post_sms_url,$headers,$params);
            return $result ;
        }
        function initSMSConnection($apiUri,$headers,$params){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUri);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST ,'POST');
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;

        }
    }