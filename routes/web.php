<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

// override Nova's login/logout routes
Route::get('nova/logout', function () {
    return redirect()->route('logout');
})->name('nova.logout');
Route::get('nova/login', function () {
    return redirect()->route('login');
})->name('nova.login');

Route::get( '/', function () {
    return view('home');
})->name('home');

Route::get('phpinfo', function(){
	phpinfo();
});