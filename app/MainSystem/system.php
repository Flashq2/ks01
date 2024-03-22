<?php
namespace App\MainSystem;

use App\Models\TableFieldModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\CssSelector\Node\FunctionNode;

class system{
    public function telegram($exception,$page) {
        $text = " ";
        $bot_api = "https://api.telegram.org";
        $telegram_id = env('TELEGRAM_ERROR_ID');
        $telegram_token = env('TELEGRAM_ERROR_TOKEN');

        $apiUri = sprintf('%s/bot%s/%s', $bot_api, $telegram_token, 'sendMessage');
                $text .= "Error Line Number: ".$exception->getLines();
                $text .= "\nFrom User : " .Auth::user()->email;
                $text .= "\nFrom Url : ".request()->path();
                $text .= "\nFrom Page : {$page}";
                $text .= "\nError Message: {$exception}";
        $params = [
            'chat_id' => $telegram_id,
            'text' => $text
        ];

        $headers = [
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUri);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    public static function Encr_string($string,$param='AES-128-ECB',$password = 'per_hast_Cehck'){
        $encrypted_string=openssl_encrypt($string,'AES-128-ECB',"per_hast_Cehck");
        return $encrypted_string;
    }
    public static function Decr_string($string,$param='AES-128-ECB',$password = 'per_hast_Cehck'){
        $table_id_2 = str_replace(' ','+',$string);
        $decrypted_string=openssl_decrypt($table_id_2,'AES-128-ECB',"per_hast_Cehck");
        return $decrypted_string;
    }
    public static function getField($table_id){
       
        $record = TableFieldModel::where('table_id',$table_id)
        ->where('email',Auth::user()->email)
        ->where('hide','<>','yes')
        ->orderBy('list_order')
        ->get();
        return $record;
    }
    public static function exportExcell ($request,$page_id){
        
    }
    // param $table_id as array
    public static function getFieldJoin($table_id){
        $record = TableFieldModel::whereIn('table_id',$table_id)
        ->where('email',Auth::user()->email)
        ->where('hide','<>','yes')
        ->get();
        return $record;
    }
    public static function extractQuery($data){
        $creterial= '1=1 and ';
        foreach($data as $key => $value){
             if($value != ""){
                $creterial .=  $key."="."'".$value."' and ";
             }
        }
        $creterial.='1=1';
    return $creterial;
    }


    public static function HasColumn($table,$column){
        if(Schema::hasColumn($table, $column)){
            return true;
        }else{
            return false;
        }
    }
}
?>
