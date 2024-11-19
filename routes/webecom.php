<?php

use App\Http\Controllers\EcomConfirmController;
use App\Http\Controllers\EcomIndexController;
use Illuminate\Support\Facades\Route;

Route::get('/',[EcomIndexController::class,'index' ]);

Route::get('/rs',[EcomIndexController::class,'rsindex']);
Route::get('/checkout',[EcomIndexController::class,'checkout']);
Route::post('/success',[EcomIndexController::class,'success','middleware' => 'setec']);

Route::group(['prefix' => 'admin', 'middleware' => 'setec'], function () { // Admin dashboard
    Route::controller(EcomConfirmController::class)->group(function () {
        Route::get('dashboard', 'index');
    });
});