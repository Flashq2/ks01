    <?php

    use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EcomIndexController;
use App\Http\Controllers\LoginController;
    use App\Http\Controllers\SystemController;
    use App\Http\Controllers\TablesController;
    use Illuminate\Support\Facades\Route;

    // Route::get('/', function () {
    //     return view('welcome');
    // });
    // Authentication For system
    Route::get('/login', [LoginController::class, 'index']);
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::post('/doLogin', [LoginController::class, 'doLogin'])->name('doLogin');
    Route::get('/verfication-opt', [LoginController::class, 'getOtpcode'])->name('verfication-opt');

    // End Authentication 

    // Eorder 


    Route::post('/add-to-card', [EcomIndexController::class, 'addToCard']);


    //  Begin Admin Routs 
    Route::group(['prefix' => 'system'], function () { // Admin dashboard
        Route::controller(SystemController::class)->group(function () {
            Route::get('select2-live-search', 'selec2LiveSearch');
            Route::get('read-notification', 'showNotification');
            Route::get('get-telegram-id', 'getTelegramID');
            Route::post('up-2fa-status', 'update2FA');
            Route::get('pre-upload-image', 'preUploadImage');
            Route::post('UploadImage/{page}/{primary}', 'UploadImage');
            Route::get('/search-page', 'liveSearchPage');
            Route::get('call-navbar', 'callNavBar');
            Route::post('update-table-list', 'changeTableField');
        });
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'setec'], function () { // Admin dashboard
        Route::controller(AdminDashboardController::class)->group(function () {
            Route::get('dashboard', 'index');
        });
    });

    Route::group(['prefix' => 'tables', 'middleware' => 'setec'], function () { // tables
        Route::controller(TablesController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/build-table', 'build');
            Route::post('/submit-data', 'submitData');
        });
    });

    Route::group(['prefix' => 'pages'], function () { // page
        Route::controller(App\Http\Controllers\PagesController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/submit-data', 'crateNewPage');
        });
    });

    Route::group(['prefix' => 'menu_group'], function () {
        Route::controller(App\Http\Controllers\MenuGroupController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');
        });
    });

    Route::group(['prefix' => 'menu'], function () {
        Route::controller(App\Http\Controllers\MenuController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');
        });
    });


    Route::group(['prefix' => 'users', 'middleware' => 'setec'], function () {
        Route::controller(App\Http\Controllers\UsersController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');

            // begin uppdate 

            Route::get('/user_card', 'transaction');
        });
    });

    Route::group(['prefix' => 'course', 'middleware' => 'setec'], function () {
        Route::controller(App\Http\Controllers\CourseController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');
        });
    });
    Route::group(['prefix' => 'department', 'middleware' => 'setec'], function () {
        Route::controller(App\Http\Controllers\DepartmentController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');
        });
    });
    Route::group(['prefix' => 'instructor', 'middleware' => 'setec'], function () {
        Route::controller(App\Http\Controllers\InstructorController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');
        });
    });
    Route::group(['prefix' => 'slide_show', 'middleware' => 'setec'], function () {
        Route::controller(App\Http\Controllers\SlideShowController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');
            Route::post('/UploadImage', 'UploadImage');
            Route::post('/Deleteimage', 'Deleteimage');
        });
    });

    Route::group(['prefix' => 'course_transaction', 'middleware' => 'setec'], function () {
        Route::controller(App\Http\Controllers\CourseTransactionController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');
        });
    });



    Route::group(['prefix' => 'customer', 'middleware' => 'setec'], function () {
        Route::controller(App\Http\Controllers\CustomerController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');

            Route::get('/customer_card', 'transaction');
        });
    });
    Route::group(['prefix' => 'vendor', 'middleware' => 'setec'], function () {
        Route::controller(App\Http\Controllers\VendorController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');

            Route::get('/vendor_card', 'transaction');
        });
    });
    Route::group(['prefix' => 'currency', 'middleware' => 'setec'], function () {
        Route::controller(App\Http\Controllers\CurrencyController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');
        });
    });
    Route::group(['prefix' => 'currency_exchange_rate', 'middleware' => 'setec'], function () {
        Route::controller(App\Http\Controllers\CurrencyExchangeRateController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');
        });
    });

    Route::group(['prefix' => 'checkount', 'middleware' => 'setec'], function () {
        Route::controller(App\Http\Controllers\CheckoutController::class)->group(function () {
            Route::get('', 'index');
            // Route::post('/create-data', 'createData');
            // Route::post('/delete-table', 'build');
            // Route::post('/edit-data', 'editData');
            // Route::post('/submit-data', 'submitData');
            // Route::post('/delete-data', 'deleteData');
            // Route::get('/ajax-paginate', 'ajaxPagination');
            // Route::get('/search', 'search');
            // Route::get('/export-excel/{table}', 'downLoadExcel');
            // Route::get('/print-pdf/{table}', 'printPDF');
            // Route::post('/upload-excel', 'ImportExcel');
        });
    });

    Route::group(['prefix' => 'items', 'middleware' => 'setec'], function () {
        Route::controller(App\Http\Controllers\ItemsController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');
            Route::get('/items_card', 'transaction');

            // Ad-on custome
            Route::get('/pre-publish-item', 'prePublishItem');
        });
    });

    Route::group(['prefix' => 'ecom_item_detail', 'middleware' => 'ecom'], function () {
        Route::controller(App\Http\Controllers\EcomItemDetailController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');

            Route::get('/ecom_item_detail_card', 'transaction');
        });
    });
    Route::group(['prefix' => 'ecom_item_detail', 'middleware' => 'ecom'], function () {
        Route::controller(App\Http\Controllers\EcomItemDetailController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');

            Route::get('/ecom_item_detail_card', 'transaction');
        });
    });
     
    Route::group(['prefix' => 'merchant', 'middleware' => 'ecom'], function () {
        Route::controller(App\Http\Controllers\MerchatController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');

            Route::get('/merchat_card', 'transaction');
        });
    });
    Route::group(['prefix' => 'item_group'], function () {
        Route::controller(App\Http\Controllers\ItemGroupController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');
        });
    });
    Route::group(['prefix' => 'item_category'], function () {
        Route::controller(App\Http\Controllers\ItemCategoryController::class)->group(function () {
            Route::get('', 'index');
            Route::post('/create-data', 'createData');
            Route::post('/delete-table', 'build');
            Route::post('/edit-data', 'editData');
            Route::post('/submit-data', 'submitData');
            Route::post('/delete-data', 'deleteData');
            Route::get('/ajax-paginate', 'ajaxPagination');
            Route::get('/search', 'search');
            Route::get('/export-excel/{table}', 'downLoadExcel');
            Route::get('/print-pdf/{table}', 'printPDF');
            Route::post('/upload-excel', 'ImportExcel');
        });
    });
