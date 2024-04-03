<?php

namespace App\Http\Controllers;
use App\MainSystem\system;
use App\Models\NotificationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TablesModel;
use Exception;


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

}
