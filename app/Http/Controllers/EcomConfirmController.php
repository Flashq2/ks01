<?php

namespace App\Http\Controllers;

use App\Models\ItemCategoryModels;
use App\Models\ItemGroupModels;
use App\Models\ItemsModels;
use App\Models\MerchatModels;
use App\Models\TempSaleHeader;
use App\Models\TempSaleLine;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EcomConfirmController extends Controller
{
    function __construct()
    {
        $this->middleware('setec');
    }
    public function index(){
        return view('client.index') ;
    }

 
    public function confirm_order(Request $request){
        $random_code = $this->randomOTPCode(6);
 
       return view('client.comfirm',compact('random_code'));
    }
    public function search(Request $request){
        $user = Auth::user();
        $user_id = $request->input('code');
        $header = TempSaleHeader::where('comfirm_code',$user_id)->first() ;
        if(!$header) return response()->json(['status' => 'warning' ,'msg' => "Document Not found"]);
        $order = TempSaleLine::where('header_id',$user_id)->where('status',"Comfirm")->get();
        $items = $order->pluck("item_no");
        $items = ItemsModels::whereIn("no",$items)->get() ;
        $record = [
            'user' => $user,
            'order'  => $order,
            'items' => $items
        ];
        $view = view('client.comfirm_card',$record)->render();
       return response()->json(['status' => 'success' ,'view' => $view]);
    }

    public function randomOTPCode($digit){
        $myRandom = str_pad(rand(1,999999), $digit, '0', STR_PAD_LEFT);
        return $myRandom ;
    }
}
