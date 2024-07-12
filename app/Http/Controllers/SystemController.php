<?php

namespace App\Http\Controllers;
use Exception;
use App\MainSystem\system;
use App\MainSystem\systemEnumStatus;
use App\Models\CustomerModels;
use App\Models\MenuModels;
use App\Models\TablesModel;
use Illuminate\Http\Request;
use App\Models\UseSetupModel;
use App\Models\NotificationModel;
use App\Models\SystemModel;
use App\Models\TableFieldModel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SystemController extends Controller
{
    public $system ;
    function __construct(){
        $this->system = new system();
    }
    public function selec2LiveSearch(Request $request){
        try{
            $data = $request->all();
            $table_name = $data['table'] ;
            $primary_field = $data['primary_field'];
            $description_field = $data['description_field'] ;
            $records = null;
            $condition = isset($data['value']) ? trim($data['value']) : '' ;
            switch($table_name) {
                case 'system_table' :
                    $use_table = TablesModel::pluck('table_name')->toArray() ;
                    $records = DB::select('SHOW TABLES');
                    collect($records)->transform(function ($row){
                            $row->no = $row->Tables_in_ks_01;
                            $row->description = $row->Tables_in_ks_01;
                            return $row ;
                        });
                    break;
                case 'system_path_view' :
                    $records = $this->getSubDirectories(resource_path('views/*'));
                     $records = collect($records)
                        ->map(fn ($value, $key) => [
                            'no' => $value ,
                            'description' => ''
                        ]);
                    break;
                case 'system_path_modal' :
                        $records = $this->getSubDirectories(app_path('Models/*'));
                         $records = collect($records)
                            ->map(fn ($value, $key) => [
                                'no' => $value ,
                                'description' => ''
                            ]);
                        break;
                case 'system_controller' :
                            $records = $this->getSubDirectories(app_path('Http/Controllers/*'));
                             $records = collect($records)
                                ->map(fn ($value, $key) => [
                                    'no' => $value ,
                                    'description' => ''
                                ]);
                        break;
                case 'system_routs' :
                            $records = $this->getFileInFolder(base_path('routes/*'));
                             $records = collect($records)
                                ->map(fn ($value, $key) => [
                                    'no' => $value ,
                                    'description' => ''
                                ]);
                            break;
                case 'table' :
                    $records = TablesModel::selectRaw("$primary_field as no ,$description_field as description")
                                    ->where(function($query) use ($condition,$primary_field,$description_field){
                                        $query->where("$primary_field", 'LIKE','%'.$condition.'%')
                                        ->orWhere("$description_field", 'LIKE','%'.$condition.'%');
                                    })->get();
                    break;
                
            }
            return  response()->json($records);

        }catch(Exception $ex){
            return response()->json(['status'=> 'error' ,'msg' => $ex->getMessage()]);
        }
    }
    public function getSubDirectories($dir)
    {
        $subDir = [];
        $directories = array_filter(glob($dir), 'is_dir');
        foreach ($directories as $directory) {
            array_push($subDir,$directory);
            if($this->getSubDirectories($directory.'/*')) {
                array_push($subDir, $this->getSubDirectories($directory.'/*'));
            }
        }
        
        $finalArrays = array_flatten($subDir);
        return $finalArrays;
    }
    public function getFileInFolder($dir) {
        return glob($dir);
    }
    public function showNotification(){
        try{
            $records = NotificationModel::where('is_read','no')->orderBy('created_at')->limit(20)->get();
            $view = view('admin.component.notification_list',compact('records'))->render() ;    
            return response()->json(['status' => 'success' ,'view' => $view]);
        }catch(Exception $ex){
            return response()->json(['status' => 'warning', 'msg' => $ex]) ;
        }
    }
    public function getTelegramID(Request $request){
        try{
            $bot_api = "https://api.telegram.org";
            $telegram_token = env('TELEGRAM_ERROR_TOKEN');
            $ch = curl_init();
            $apiUri = sprintf('%s/bot%s/%s', $bot_api, $telegram_token, 'getUpdates?offset=-1');
            $headers = [
                'Content-Type: application/json'
            ];

            curl_setopt($ch, CURLOPT_URL, $apiUri);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);
            $json_result = json_decode($result) ;
            $id = end($json_result->result);
            return response()->json(['status' => 'success','telegratem' => $id->message->from->id  ]);
        }catch(Exception $ex){
            return response()->json(['status' => 'warning', 'msg' => $ex]) ;
        }
    }
    public function update2FA(Request $request){
        try{
            $data = $request->all() ;
            $type = $data['type'];
            if($type == 'no') $type = 'yes' ;
            else $type = 'no' ; 
            $record = UseSetupModel::where('email',Auth::user()->email)->first()    ;
            $record->two_authentiacation= $type;
            $record->save() ;
            return response()->json(['status' =>'success' ,'msg' => '']) ;
        }catch(Exception $ex){
            return response()->json(['status' => 'warning', 'msg' => $ex]) ;
        }
    }
    public function preUploadImage(Request $request){
        try{
            $data = $request->all() ;
            $page = $data['page'];
            $code = $data['code'];
            $record = $this->system->getRecordByPageNameAndPrimarykey($page,$code);
            if(isset($record['status'])){
                return response()->json(['status' => 'warning' ,'msg' => $record['msg']]);
            }
            $primary_key = $record['primary_key'];
            $record = $record['record'] ;
            $response =[
                'page' =>$page,
                'code' => $code,
                'record' => $record,
                'primary_key' => $primary_key
            ];

            $view = view('admin.component.modal_update_image',$response)->render();
            return response()->json(['status' => 'success','view' => $view]) ;
        }catch(Exception $ex){
            return response()->json(['status' => 'warning' ,'msg' => $ex->getMessage()]);
        }
    }
    public function UploadImage(Request $request,$page,$code){
        try{
           $record = $this->system->getRecordByPageNameAndPrimarykey($page,$code);
            if(isset($record['status'])){
                    return response()->json(['status' => 'warning' ,'msg' => $record['msg']]);
            }
            $primary_key = $record['primary_key'];
            $record = $record['record'] ;
            $upload_path = "upload/$page/".$code;
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777, true);
            }
            $fileName = $_FILES["fileimage"]['name'];
            $fileTmpLoc = $_FILES["fileimage"]["tmp_name"];
            $kaboom = explode(".", $fileName);
            $fileExt = end($kaboom);
            $token = openssl_random_pseudo_bytes(20);
            $token = bin2hex($token);
            $fname = $token . '.' . $fileExt;
            $moveResult = move_uploaded_file($fileTmpLoc, $upload_path . "/" . $fname);
                if($moveResult){
                    $http = $request->getSchemeAndHttpHost();
                    $file_path = $http.'/'. $upload_path . "/" . $fname ;
                    $record->picture_ori = $file_path;
                    $record->save();
                    DB::commit();
                    return response()->json(['status' => 'success' , 'msg' => 'Your changes have been successfully saved!','path' => $file_path,'id' => $record->$code]);
                }
                return response()->json(['status' => 'warning' , 'msg' => 'Something went wrong !']);   
           return dd($record) ;

        }catch(Exception $ex){
            return response()->json(['status' => 'warning' ,'msg' => $ex->getMessage()]);
        }
    }
    public function liveSearchPage(Request $request){
        $data = $request->all();
        // dd($data)   ;
        $value = trim($data['value']);
        $record = MenuModels::where(function($query) use ($value){
            $query->where("code", 'LIKE','%'.$value.'%')
            ->orWhere("description", 'LIKE','%'.$value.'%');
        })->get();
        $view = view('admin.component.template.list_page_search',['record' => $record])->render();
        return response()->json(['status' => 'success' , 'view' => $view]);
    }
    public function callNavBar(Request $request){
        try{
            $data = $request->all();
            $table_name = trim($data['page']);
            $tap_id = $data['tab_ids'];
            if(!$table_name) return response()->json(['status' => 'warning', 'msg' => 'Table Not found']) ; 
            $table_field = TableFieldModel::where('table_name',$table_name)->get();
            if(count($table_field) <= 0) return response()->json(['status' => 'warning', 'msg' => 'Please build or Compile table first !']) ; 
            if($tap_id == '' || !$tap_id) $tap_id = 1;
            switch($tap_id){
                case 1 :
                    $params = [
                        'table_field' => $table_field,
                    ];
                    $view = view('admin.component.template.fill-tabpanel-0',$params)->render() ;
                    return response()->json(['status' => 'success' ,'view' => $view]);
                    break ;
                case 2 :
                        $page_id = 
                        $view = view('admin.component.template.fill-tabpanel-1')->render() ;
                        return response()->json(['status' => 'success' ,'view' => $view]);
                        break ;
                default :
                    return response()->json(['status' => 'warning' ,'msg' => 'Something went wrong !']) ;
                    break ;

            }
        }catch(Exception $ex){
            return response()->json(['status' => 'warning', 'msg' => $ex->getMessage()]) ;
        }
    }
    public function changeTableField(Request $request){
        DB::beginTransaction();
        try{
            $data = $request->all();
            $page_id = $data['page_id'];
            $field_id = $data['field_id'];
            $name = $data['field_name'];
            $value = removeDataSpace($data['value']);
            $record = TableFieldModel::where('table_id',$page_id)->where('field_id',$field_id)->first() ;
            if(!$record) return response()->json(['status' => 'warning' ,'msg' => systemEnumStatus::Notfound]);
            $record->$name = $value;
            $record->save();
            DB::commit();

            return response()->json(['status' => 'success','msg' => systemEnumStatus::SaveSuccess]);
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['status' => 'warning', 'msg' => $ex->getMessage()]) ;
        }
    }

}
