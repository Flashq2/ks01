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
        $user_id = Auth::user()->id;
        
        TempSaleLine::where("header_id",$user_id)->update(['status' => 'Comfirm']);
        TempSaleHeader::where("user_id",$user_id)->update(['status' => 'Comfirm']);
       return view('client.success',compact('random_code'));
    }

    public function randomOTPCode($digit){
        $myRandom = str_pad(rand(1,999999), $digit, '0', STR_PAD_LEFT);
        return $myRandom ;
    }
}
