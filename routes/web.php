<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\SaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Supervisor\SupervisorController;
use App\Http\Controllers\SemiAdmin\SemiAdminController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Supervisor\FormController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Auth Routes
Route::get('/', [AuthController::class, 'login_form'])->name('login-form');
Route::get('/login', [AuthController::class, 'login_form'])->name('login-form')->middleware('dashboard');
Route::post('/loginPost', [AuthController::class, 'Login'])->name('login-save');

Route::group(['middleware' => 'logged'], function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //dashboard
    Route::get('/main-view', [DashboardController::class, 'index']);

    //Supervisor Routes
    // Route::get('/add-supervisor', [SupervisorController::class, 'superVisorView']);
    // Route::post('/save-supervisor', [SupervisorController::class, 'saveSuperVisor']);

    // Route::get('user/add/{role}/{type}/{filterRole}', [SemiAdminController::class, 'addSemiAdmin']);
    // Route::post('user/add/', [SemiAdminController::class, 'storeSemiAdmin']);
    //    Route::get('/supervisor/home', [SemiAdminController::class, 'addSemiAdmin']);

    //Admin Routes
    require __DIR__ . '/admin.php';

    //Semi Admin Routes
    // Route::get('/semi-admin-listing', [SemiAdminController::class, 'listing'])->middleware('role:admin');


    //Supervisor Routes
//    require __DIR__ . '/supervisor.php';
//
//
//    //semi-admin routes
//    require __DIR__ . '/manager.php';
//
//
//    //Employee Routes
//    require __DIR__ . '/employee.php';


    Route::get('/add-supervisor', function () {
        return view('managers.add-supervisor');
    })->name('test');

    Route::get('/sales', function () {
        return view('managers.index');
    });


    Route::get('/sup-dashboard', function () {
        return view('supervisors.dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//require __DIR__ . '/auth.php';
