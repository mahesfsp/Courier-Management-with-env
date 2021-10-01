<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\AdminController;
use App\http\Controllers\Admin\CompanyController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/track', [App\Http\Controllers\HomeController::class, 'getCourierstatus'])->name('track_no');
//Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function(){
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('company-master',[App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('company.view');
    Route::post('company-master',[App\Http\Controllers\Admin\CompanyController::class, 'store'])->name('company.store');
    Route::put('company-master',[App\Http\Controllers\Admin\CompanyController::class, 'update'])->name('company.update');
    Route::get('branch-master',[App\Http\Controllers\Admin\BranchController::class, 'index'])->name('branch.view');
    Route::get('branch-master/add',[App\Http\Controllers\Admin\BranchController::class, 'add'])->name('branch.add');
    Route::get('branch-master/edit/{id}',[App\Http\Controllers\Admin\BranchController::class, 'edit'])->name('branch.edit');
    Route::delete('branch-master/delete/{id}',[App\Http\Controllers\Admin\BranchController::class, 'delete'])->name('branch.delete');
});

Route::group(['as'=>'staff.','prefix'=>'staff','namespace'=>'Staff','middleware'=>['auth','staff']],function(){
    Route::get('dashboard',[App\Http\Controllers\Staff\DashboardController::class, 'index'])->name('dashboard');
    Route::get('courier',[App\Http\Controllers\Staff\CourierController::class, 'index'])->name('courier.view');
    Route::get('courier/package_detail',[App\Http\Controllers\Staff\CourierController::class, 'packageDetail'])->name('courier.package_details');
    Route::get('courier/add',[App\Http\Controllers\Staff\CourierController::class, 'add'])->name('courier.add');
    Route::get('courier/add_action/{id}',[App\Http\Controllers\Staff\CourierController::class, 'addCourieraction'])->name('courier.courier_action');
    Route::post('courier',[App\Http\Controllers\Staff\CourierController::class, 'store'])->name('courier.store');
    Route::post('courier-action',[App\Http\Controllers\Staff\CourierController::class, 'courierActionstore'])->name('courier.action');
});
