<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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




Route::get('/', [UserController::class, 'index']);
Route::post('/user/register', [UserController::class, 'store']);
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Auth::routes();
// Route::get('api/customers','CustomerController@data');
// Route::get('customers','CustomerController@index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
