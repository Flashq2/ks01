<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcomHomePageController extends Controller
{
    public function index(){
        
        return view('user.home_page');
    }
}
