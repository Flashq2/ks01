<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcomIndexController extends Controller
{
    public function index(){
        return view('ecom.page.app') ;
    }
}
