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
use SebastianBergmann\Template\Template;

class EcomIndexController extends Controller
{
    function __construct()
    {
        $this->middleware('ecom');
    }
    public function index(){
        return view('client.index') ;
    }

    public function rsindex(Request $request){
        try{
            if(!isset($request->merchant)) return response()->json(['status' => 'warning' ,'msg' => 'No merchant found']);

            $request_merchant = $request->merchant;
            $merchant_code = decryptHelper($request_merchant);
            $merchant = MerchatModels::where("code",$merchant_code)->first() ;
            if(!$merchant) return response()->json(['status' => 'warning' ,'msg' => "Merchant not register yet"]);  
            $item = ItemsModels::where("unit_price",">",0)->where("merchant_code",$merchant_code)->get() ;
            $item_category = ItemCategoryModels::all() ;
            $item_group = ItemGroupModels::all() ;
            
            $response_data = [
                'items' => $item,
                'item_category' => $item_category ,
                'item_group'  => $item_group,
                'merchant' => $merchant 
            ]  ;
            return view("client.resterant",$response_data);
        }catch(Exception $ex){
            return response()->json(['status' => "warning" ,'msg' => "Something went wrong !"]);
        }
    }

    public function addToCard(Request $request){
        $user = Auth::user() ;
        $user_id = $user->id;
        $item_no = ($request->item_no);
        $temp_header = TempSaleHeader::where("user_id",$user_id)->first();
        if(!$temp_header){
            $temp_header = new TempSaleHeader() ;
            $temp_header->id = TempSaleHeader::max("id")+100;
            $temp_header->order_date = Carbon::now()->toDateString();
            $temp_header->status = "New" ;
            $temp_header->user_id = $user_id;
            $temp_header->save() ;
        }
        // Create line 

        $temp_line = new TempSaleLine();
        $temp_line->header_id  = $temp_header->user_id;
        $temp_line->item_no  = $item_no;
        $temp_line->quantity = $request->qty;
        $temp_line->status = "New" ;
        $temp_line->save() ;

        return response()->json(['status' => 'success','msg' => "Order Created"]);



    }

    public function checkout(){
        $user = Auth::user();
        $user_id = $user->id;
        $order = TempSaleLine::where('header_id',$user_id)->where('status',"New")->get();
        $items = $order->pluck("item_no");
        $items = ItemsModels::whereIn("no",$items)->get() ;
        $record = [
            'user' => $user,
            'order'  => $order,
            'items' => $items
        ];
        return view("client.checkout",$record);
    }

    public function success(Request $request){
        $random_code = $this->randomOTPCode(6);
        $user_id = Auth::user()->id;
        
        TempSaleLine::where("header_id",$user_id)->update(['status' => 'Comfirm']);
        TempSaleHeader::where("user_id",$user_id)->update(['status' => 'Comfirm','comfirm_code' => $random_code]);
       return view('client.success',compact('random_code'));
    }

    public function randomOTPCode($digit){
        $myRandom = str_pad(rand(1,999999), $digit, '0', STR_PAD_LEFT);
        return $myRandom ;
    }
}
