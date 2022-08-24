<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InwardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RidfController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', [UserController::class,'index'])->name('user');

Route::get('clients', [ClientController::class,'index'])->name('clients');

Route::get('tasks',[TaskController::class,'index'])->name('tasks');

Route::get('products',[ProductController::class,'index'])->name('products');

Route::get('ridfs',[RidfController::class,'index'])->name('ridfs');

Route::get('inwards', [InwardController::class,'index'])->name('inwards');


// Route::get('test',function ()
// {
//     return view('Test.test');
// });
