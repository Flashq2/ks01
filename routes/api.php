<?php

use App\Http\Controllers\ApiController;
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


Route::get('/get-course',[ApiController::class,'getCourse']);
Route::get('/get-course-all',[ApiController::class,'getAllCourse']);
Route::get('/get-course-by-id/{id}',[ApiController::class,'getCourseById']);
Route::post('/post-course-by-id',[ApiController::class,'postCourseById']);
Route::group(['prefix' => 'employe'],function(){  
                Route::controller(App\Http\Controllers\EmployeController::class)->group(function(){
                    Route::get('','index');
                    Route::post('/create-data','createData');
                    Route::post('/delete-table','build');
                    Route::post('/edit-data','editData');
                    Route::post('/submit-data','submitData');
                    Route::post('/delete-data','deleteData');
                    Route::get('/ajax-paginate','ajaxPagination');
                    Route::get('/search','search');
                    Route::get('/export-excel/{table}','downLoadExcel');
                    Route::get('/print-pdf/{table}','printPDF');
                    Route::post('/upload-excel','ImportExcel');

                    Route::get('/employe_card', 'transaction');
                });
            });