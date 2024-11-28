<?php

use Illuminate\Support\Facades\Route;

/* Controller List */
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\IndexController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\SettingController;
use App\Http\Controllers\Backend\Admin\{
    UserController,
    DesignationController,
    RoleController,
    PermissionController,
    RolePermissionController,
    VisitorController,
    DepartmentController,
    OfficeController,
    OfficeCategoryController,
    AppointmentController,
    NotificationController,
    ClientInfoController,
    ClientDataController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');

    return "Clean";
    // return what you want
});

Route::get('/updateapp', function()
{
    Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});

Route::get('/link-storage', function() {
    $exitCode = Artisan::call('storage:link');

    return "Linked";
    // return what you want
});

Auth::routes();
Route::get('/register', function() {
    return redirect()->route('login');
});

Route::get('/', [IndexController::class, 'login'])->name('login');
Route::post('/visitor-registration', [IndexController::class, 'store'])->name('visitorRegistration');

Route::group(['middleware' => ['AuthGates'], 'prefix' => '/admin', 'as' => 'admin.'], function() {

    Route::get('/', [IndexController::class, 'adminDashboard'])->name('index');

    /* Manage User Routes */
    Route::group(['prefix' => '/user', 'as' => 'user.'], function() {
        Route::get('/index', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::get('/block/{user}', [UserController::class, 'block'])->name('block');
        Route::get('/delete/{user}', [UserController::class, 'destroy'])->name('delete');
        Route::get('/editProfile/{username}', [UserController::class, 'editProfile'])->name('editProfile');
        Route::post('/updateProfile/{user}', [UserController::class, 'updateProfile'])->name('updateProfile');
        Route::post('/updatePassword/{user}', [UserController::class, 'updatePassword'])->name('updatePassword');
    });


    // Manage Client Info Routes
    Route::group(['prefix' => '/client-info', 'as' => 'clientInfo.'], function() {
        Route::get('/', [ClientInfoController::class, 'index'])->name('index');
        Route::get('/create', [ClientInfoController::class, 'create'])->name('create');
        Route::post('/store', [ClientInfoController::class, 'store'])->name('store');
        Route::get('/show/{id}', [ClientInfoController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [ClientInfoController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ClientInfoController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ClientInfoController::class, 'destroy'])->name('delete');
    });

    // Manage Client Data Routes
    Route::group(['prefix' => '/client-data', 'as' => 'clientData.'], function() {
        Route::post('/store', [ClientDataController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [ClientDataController::class, 'destroy'])->name('delete');
        Route::post('/rename', [ClientDataController::class, 'rename'])->name('rename');
        Route::post('/note', [ClientDataController::class, 'note'])->name('note');
    });


    // Manage Visitor Routes
    Route::group(['prefix' => '/visitor', 'as' => 'visitor.'], function() {
        Route::get('/', [VisitorController::class, 'index'])->name('index');
        Route::get('/create', [VisitorController::class, 'create'])->name('create');
        Route::post('/store', [VisitorController::class, 'store'])->name('store');
        Route::get('/show/{id}', [VisitorController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [VisitorController::class, 'edit'])->name('edit');
        Route::post('/update', [VisitorController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [VisitorController::class, 'destroy'])->name('delete');
        Route::post('/update-status/{id}', [VisitorController::class, 'updateStatus'])->name('updateStatus');
    });

    Route::group(['prefix' => '/department', 'as' => 'department.'], function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('index');
        Route::post('/store', [DepartmentController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [DepartmentController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [DepartmentController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => '/office', 'as' => 'office.'], function () {
        Route::get('/', [OfficeController::class, 'index'])->name('index');
        Route::post('/store', [OfficeController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [OfficeController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [OfficeController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [OfficeController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => '/office-category', 'as' => 'officeCategory.'], function () {
        Route::get('/', [OfficeCategoryController::class, 'index'])->name('index');
        Route::post('/store', [OfficeCategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [OfficeCategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [OfficeCategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [OfficeCategoryController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => '/appointment', 'as' => 'appointment.'], function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('index');
        Route::get('/create', [AppointmentController::class, 'create'])->name('create');
        Route::post('/store', [AppointmentController::class, 'store'])->name('store');
        Route::get('/show/{id}', [AppointmentController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [AppointmentController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AppointmentController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AppointmentController::class, 'destroy'])->name('delete');
        Route::post('/update-status/{id}', [AppointmentController::class, 'updateStatus'])->name('updateStatus');
    });

    /* Manage Roles Routes */
    Route::group(['prefix' => '/role', 'as' => 'role.'], function() {
        Route::get('/index', [RoleController::class, 'index'])->name('index');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        Route::post('/store', [RoleController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('update');
    });

    /* Manage Permission Routes */
    Route::group(['prefix' => '/permission', 'as' => 'permission.'], function() {
        Route::get('/index', [PermissionController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('edit');
        Route::post('/create', [PermissionController::class, 'create'])->name('create');
        Route::post('/update/{id}',[PermissionController::class, 'update'])->name('update');
    });

    /* Manage RolePermission */
    Route::group(['prefix' => '/role-permission', 'as' => 'rolePermission.'], function() {
        Route::get('/', [RolePermissionController::class, 'index'])->name('index');
        Route::get('/showPermission/{roleId}', [RolePermissionController::class, 'showPermission'])->name('showPermission');
        Route::post('/remove-permission', [RolePermissionController::class, 'removePermission'])->name('removePermission');
        Route::post('/give-permission', [RolePermissionController::class, 'givePermission'])->name('givePermission');
    });

    /* Manage Designation */
    Route::group(['prefix' => '/designation', 'as' => 'designation.'], function() {
        Route::get('/index', [DesignationController::class, 'index'])->name('index');
        Route::get('/create', [DesignationController::class, 'create'])->name('create');
        Route::post('/store', [DesignationController::class, 'store'])->name('store');
        Route::get('/show/{designation}', [DesignationController::class, 'show'])->name('show');
        Route::get('/edit/{designation}', [DesignationController::class, 'edit'])->name('edit');
        Route::post('/update/{designation}', [DesignationController::class, 'update'])->name('update');
        Route::get('/destroy/{designation}', [DesignationController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '/notification'], function() {
        Route::get('/', [NotificationController::class, 'index'])->name('notification.index');
        // Route::get('/read/{message}/{reference_id}', [NotificationController::class, 'read_view'])->name('notification.read_view');
        Route::get('/read-notification/{id}', [NotificationController::class, 'read_notification'])->name('notification.read_notification');
    });

    /* Manage setting */
    Route::group(['prefix' => '/setting', 'as' => 'setting.'], function() {
        Route::get('/edit/{id}',[SettingController::class,'edit'])->name('edit');
        Route::post('/update/{setting}',[SettingController::class,'update'])->name('update');
    });

});

// forgot password
Route::post('/forgot-password', ['uses' => 'ForgotPasswordController@sendMail'])->name('forgotPasswordSendMail');
Route::post('/update-password', ['uses' => 'ForgotPasswordController@updatePassword'])->name('updatePassword');