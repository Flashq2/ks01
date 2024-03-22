<?php

// Created By : pokputhea2@gmail.com
// Created Date : 2024-22-02
// Type : page card & popup 

namespace App\Http\Controllers;

use App\MainSystem\system;
use App\Models\Tables;
use Exception;
use Illuminate\Http\Request;
use Pusher\Pusher;

class TablesController extends Controller
{
    protected $system;
    protected $page ;
    protected $prefix ;
    protected $page_id ;
    protected $modal_path ;
    protected $page_card_id ;
    protected $pusher ;
    protected $options;
    function __construct()
    {
        // Global varaible Do not make any change , 
        $this->system = new system() ;
        $this->page = "Tables" ;
        $this->prefix = "tables";
        $this->page_id = '1001';
        $this->page_card_id = '1002';
        $this->modal_path = 'App\Models\Tables';
        $this->options = array('cluster' => 'ap1','encrypted' => true);
        $this->pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $this->options
        );

    }
    public function index(){
        $page = "Tables" ;
        $tabe_id = '1001' ;
        $page_id = '1001' ;
        $prefix = 'tables';
        $records = Tables::get();
        $param =[
            'page' => $page ,
            'tabe_id' => $tabe_id,
            'page_id' => $page_id ,
            'prefix' => $prefix,
            'records' => $records
        ];
        return view('admin.tables.tables',$param) ;
    }


    public function createData(Request $request){
        try{

        }catch(Exception $ex){
            $this->system->telegram($ex,$this->page);
        }
    }
}