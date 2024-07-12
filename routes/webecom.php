<?php

use App\Http\Controllers\EcomIndexController;
use Illuminate\Support\Facades\Route;





    Route::get('/',[EcomIndexController::class,'index']);