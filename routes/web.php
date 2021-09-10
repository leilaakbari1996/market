<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'index'])->name('client.home');
Route::get('/adminpanel', function () {
    return view('Admin.home');
});
Route::prefix('/adminpanel')->name('admin.')->group(function(){
    Route::resource('category',CategoryController::class);
});
