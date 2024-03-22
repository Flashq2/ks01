<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use App\Models\MenuModel;
use App\MainSystem\system;
use App\Models\TableModel;
use Illuminate\Http\Request;
use App\Models\MenuGroupModel;
use App\Models\SlideShowModel;
use App\Models\WarehouseModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use App\Imports\Importdata;
use App\Models\ItemBrandModel;
use App\Models\ItemCategoryModel;
use App\Models\RoomModel;
use Illuminate\Support\Arr;

class SystemController extends Controller
{
    public $system ;
    function __construct(){
        $this->system = new system();
    }
    public function LiveSearch (Request $request,$group){
        $data = $request->all();
        $condition = $data['q'];
        switch ($group) {
            case 'search-item':
                 $items = ItemModel::selectRaw('code as no ,description,id')
                 ->where(function($query) use ($condition){
                    $query->where('code', 'LIKE','%'.$condition.'%')
                    ->orWhere('description', 'LIKE','%'.$condition.'%');
                 })
                 ->get();
                 $items->transform(function ($item) {
                    $item->edit_code = url('/item/item_card?para=item&group=items&type=up&code=').$this->system->Encr_string($item->id);
                return $item;
                });
                break;
            // new case here
            case 'search-menu' :
                $items = MenuModel::selectRaw('code as no ,description,menu_group_code,url,param')
                ->where(function($query) use ($condition){
                   $query->where('code', 'LIKE','%'.$condition.'%')
                   ->orWhere('description', 'LIKE','%'.$condition.'%');
                })
                ->get();
                $items->transform(function ($item) {
                   $item->edit_code = url($item->url).'?param='.$item->param.'&group='.$item->menu_group_code ;
               return $item;
               });
                break;
            case 'inactived' :
                $items = collect([(object) [
                                'no' => 'Yes',
                                'description' => 'Yes'
                            ],
                            (object) [
                                'no' => 'No',
                                'description' => 'No'
                            ]]);
                 
                break;
            case 'adjustment_type' :
                $items = collect([(object) [
                                'no' => 'negative',
                                'description' => 'Negative'
                            ],
                            (object) [
                                'no' => 'positive',
                                'description' => 'Positive'
                            ]]);
            break;
            default:
                
                break;
        }
       
        return  response()->json($items);
    }
    public function SearchTable(Request $request,$page){
        try {
            $data = $request->all();
            if($page == 'item') $page = 'items';
            if($page == 'warehouse') $page = 'warehouses';
            $table = TableModel::where('table_name',$page)->first();
            $col_record = $this->system->getField($table->table_id);
            $extract_query = $this->system->extractQuery($data);
            $link_record = null;
            switch($page){
                case 'menu':
                    $record = MenuModel::whereRaw($extract_query)->paginate(15);
                    break;
                case 'items':
                        $record = ItemModel::whereRaw($extract_query)->paginate(15);
                        $record->setCollection(
                            $record->getCollection()->transform(function ($item) {
                                $item->edit_code = $this->system->Encr_string($item->id) ;
                            return $item;
                            })
                        );
                        $link_record = url('/item/item_card');
                        break;
                case 'menu_group':
                        $record = MenuGroupModel::whereRaw($extract_query)->paginate(15);
                        break;
                case 'warehouses':
                        $record = WarehouseModel::whereRaw($extract_query)->paginate(15);
                        break;
                case 'slide_show':
                    $record = SlideShowModel::whereRaw($extract_query)->paginate(15);
                    break;
                case 'room':
                        $record = RoomModel::whereRaw($extract_query)->paginate(15);
                        break;

                default:
                    
                    break; 
            }
            $view = view('admin.menu_group.table_record',compact('col_record','record','link_record'))->render();
            return response()->json(['status' =>'success','view' =>$view]);
        } catch (\Exception $ex){
            $this->system->telegram($ex->getMessage(),$page,$ex->getLine());
            return response()->json(['status' => 'warning' , 'msg' => $ex->getMessage()]);
        }
      
    }
    public function DoLogout(Request $request){
        try {
            Auth::logout();
            return response()->json(['status' => 'success']);
        } catch (\Exception $ex) {
            $this->system->telegram($ex->getMessage(),'global',$ex->getLine());
            return response()->json(['status' => 'warning' , 'msg' => $ex->getMessage()]);
        }
    }
    public function ExportExcell(Request $request,$table){
        try {
            $request_table = $table;
            $data = $request->all();
            $table = TableModel::where('table_name',$request_table)->first();
            $col_record = $this->system->getField($table->table_id);
            $extract_query = $this->system->extractQuery($data);
            $page_id = $table->table_id ;
            $token = openssl_random_pseudo_bytes(10); // Random ssl
            $token = bin2hex($token); // convert to hex
            $save_to_path = 'export'; 
            $file_path = "export/$token-$request_table.xlsx";                    
            if (!file_exists($save_to_path)) mkdir($save_to_path, 0777, true);

            $http = $request->getSchemeAndHttpHost();
            // $domain = \Config::get('app.domain_name');
            $result = Excel::store(new UserExport($col_record,$request_table,$extract_query),"$file_path",'local');
            $url = "$http/app/$file_path";
            if(!$result)   return response()->json(['status' =>'warning','msg' => 'Something went wrong']);
            return response()->json(['status' =>'success','msg' => 'Successfully export excell','path' => $url]);
        } catch (\Exception $ex) {
            $this->system->telegram($ex->getMessage(),'global',$ex->getLine());
            return response()->json(['status' => 'warning' , 'msg' => $ex->getMessage()]);
        }
    }
    public function ImportExcell(Request $request,$table){
        try{
            $data = $request->all();
            $row = Excel::toArray(new Importdata(),$data['file_excel']);
            $row_header = end($row);
            $header = $row_header[0];
            $url = array('home'=>'Home','about'=>'About','contact'=>'Contact');
            $main_data = collect([]);
            
         
            for($i = 1 ;$i<sizeof($row_header);$i++){
                 $collect = collect([]);
                  for($j =0; $j < sizeof($header);$j++){
                     $collect[$header[$j]]  = $row_header[$i][$j];
                  }
                  $main_data->push($collect->toArray());
            }
            $i =0;
            foreach($main_data as $sub_collection){
                switch($table){
                    case 'menu':
                        $insert_record  = new MenuModel();
                        $modal_path = 'App\Models\MenuModel';
                       break;
                    case 'items':
                        $insert_record  = new ItemModel();
                        $modal_path = 'App\Models\ItemModel';
                       break;
                    case 'item_category':
                        $insert_record  = new ItemCategoryModel();
                        $modal_path = 'App\Models\ItemCategoryModel';
                       break;
                    case 'item_brand':
                        $insert_record  = new ItemBrandModel();
                        $modal_path = 'App\Models\ItemBrandModel';
                       break;
                    case 'menu_group':
                        $insert_record  = new MenuGroupModel();
                        $modal_path = 'App\Models\MenuGroupModel';
                       break;
                    case 'warehouses':
                        $insert_record  = new WarehouseModel();
                        $modal_path = 'App\Models\WarehouseModel';
                       break;
                    case 'slide_show':
                        $insert_record  = new SlideShowModel();
                        $modal_path = 'App\Models\SlideShowModel';
                       break;
                    
                    default:
                        
                        break;  
                }
                 foreach($sub_collection as $key=>$value){
                     if($this->system->HasColumn($table,$key)) {
                         $insert_record[$key] = $value;
                     }
                 }
            $record_exist = $modal_path::where('code',$insert_record['code'])->first();
            if($record_exist){
                foreach ($insert_record->toArray() as $key=>$record) {
                    $record_exist[$key] = $record;
                }
                $record_exist->save();
            }else{
                $insert_record->save();
            }
            
            }
            return response()->json(['status' =>'success','msg' =>'Data Import Successfully']);
        }catch (\Exception $ex) {
            $this->system->telegram($ex->getMessage(),'global',$ex->getLine());
            return response()->json(['status' => 'warning' , 'msg' => $ex->getMessage()]);
        }
     
    }

    public function DoSendSumaryTelegramBot(){
        $text = "Process Posting Invoice Summary";
        $bot_api = "https://api.telegram.org";
        $telegram_id = "-1002076559971";
        $telegram_token = "6881991913:AAGXE0Ij82fwhvThLDeU0ouqJ9mq4uNNsT8";

        $apiUri = sprintf('%s/bot%s/%s', $bot_api, $telegram_token, 'sendMessage');
        $params = [
            'chat_id' => $telegram_id,
            'text' => $text
        ];

        $headers = [
            'Content-Type: application/json'
        ];
        $result = $this->SetTelegramConnection($apiUri,$headers,$params);

    }

    public function SetTelegramConnection($apiUri,$headers,$params){
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
}
