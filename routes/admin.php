<?php

use Illuminate\Support\Facades\Route;


//Route::group(['prefix' => '/admin', 'middleware' => ['role:admin'], 'as' => 'admin.'], function () {
Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {

    Route::get('/dashboard', [\App\Http\Controllers\Admin\PageController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [\App\Http\Controllers\Admin\PageController::class, 'profile'])->name('profile');
    Route::get('/profile/{id}', [\App\Http\Controllers\Admin\PageController::class, 'getAdmin'])->name('profile.getadmin');
    Route::put('/profile', [\App\Http\Controllers\Admin\PageController::class, 'update'])->name('profile.update');

    Route::get('/products' ,[\App\Http\Controllers\ProductController::class,'all'])->name('products');

    Route::resource('/supervisors', \App\Http\Controllers\Admin\SupervisorController::class)->except('destroy');

    Route::get('/supervisors/{supervisor}/employees', [\App\Http\Controllers\Admin\SupervisorController::class, 'employees'])->name('supervisors.employees');

    Route::get('/supervisors/{supervisor}/forms', [\App\Http\Controllers\Admin\SupervisorController::class, 'forms'])->name('supervisors.forms');



    Route::resource('/employees', \App\Http\Controllers\Admin\EmployeeController::class)->except('destroy');

    Route::get('/employees/{employee}/forms', [\App\Http\Controllers\Admin\EmployeeController::class, 'forms'])->name('employees.forms');



    Route::resource('/semi-admins', \App\Http\Controllers\Admin\SemiAdminController::class)->except('destroy');

    Route::get('/semi-admins/{semi_admin}/supervisors', [\App\Http\Controllers\Admin\SemiAdminController::class, 'supervisors'])->name('semi-admins.supervisors');

    Route::get('/semi-admins/{semi_admin}/forms', [\App\Http\Controllers\Admin\SemiAdminController::class, 'forms'])->name('semi-admins.forms');



    Route::resource('/forms', \App\Http\Controllers\Admin\FormController::class)->only(['index', 'show']);
});
