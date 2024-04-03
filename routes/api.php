<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'menu_group'],function(){  
            Route::controller(App\Http\Controllers\MenuGroupController::class)->group(function(){
                Route::get('','index');
                Route::post('/create-data','createData');
                Route::post('/delete-table','build');
                Route::post('/edit-data','build');
                Route::post('/submit-data','submitData');
            });
        });