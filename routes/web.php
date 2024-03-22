<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TablesController;
use Illuminate\Queue\Console\TableCommand;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//  Begin Admin Routs 
    Route::group(['prefix' => 'admin'],function(){ // Admin dashboard
        Route::controller(AdminDashboardController::class)->group(function(){
            Route::get('dashboard','index');
        });
    });

    Route::group(['prefix' => 'tables'],function(){ // tables
        Route::controller(TablesController::class)->group(function(){
            Route::get('','index');
            Route::post('/create-data','createData');
        });
    });

    Route::group(['prefix' => 'pages'],function(){ // tables
        Route::controller(PagesController::class)->group(function(){
            Route::get('dashboard','index');
        });
    });
    
// End Admin Routs 

//============================================

//  Begin User Routs 


// End User Routs 

