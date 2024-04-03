<?php

use App\Http\Controllers\AdminDashboardController;
// use App\Http\Controllers\PagesController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TablesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//  Begin Admin Routs 
    Route::group(['prefix' => 'system'],function(){ // Admin dashboard
        Route::controller(SystemController::class)->group(function(){
            Route::get('select2-live-search','selec2LiveSearch');
            Route::get('read-notification','showNotification') ;
        });
    });

    Route::group(['prefix' => 'admin'],function(){ // Admin dashboard
        Route::controller(AdminDashboardController::class)->group(function(){
            Route::get('dashboard','index');
        });
    });

    Route::group(['prefix' => 'tables'],function(){ // tables
        Route::controller(TablesController::class)->group(function(){
            Route::get('','index');
            Route::post('/create-data','createData');
            Route::post('/build-table','build');
            Route::post('/submit-data','submitData');
        });
    });

    Route::group(['prefix' => 'pages'],function(){ // page
        Route::controller(App\Http\Controllers\PagesController::class)->group(function(){
            Route::get('','index');
            Route::post('/create-data','createData');
            Route::post('/submit-data','crateNewPage');
        });
    });
 
    Route::group(['prefix' => 'menu_group'],function(){  
            Route::controller(App\Http\Controllers\MenuGroupController::class)->group(function(){
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
            });
        });
        
    Route::group(['prefix' => 'menu'],function(){  
                Route::controller(App\Http\Controllers\MenuController::class)->group(function(){
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
                });
            });

    Route::group(['prefix' => 'course'],function(){  
                Route::controller(App\Http\Controllers\CourseController::class)->group(function(){
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
                });
            });
    Route::group(['prefix' => 'department'],function(){  
                Route::controller(App\Http\Controllers\DepartmentController::class)->group(function(){
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
                });
            });


    Route::group(['prefix' => 'instructor'],function(){  
                Route::controller(App\Http\Controllers\InstructorController::class)->group(function(){
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
                });
            });
Route::group(['prefix' => 'slide_show'],function(){  
            Route::controller(App\Http\Controllers\SlideShowController::class)->group(function(){
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
            });
        });
Route::group(['prefix' => 'users'],function(){  
            Route::controller(App\Http\Controllers\UsersController::class)->group(function(){
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

                // begin uppdate 

                Route::get('/user_card','transaction');
            });
        });