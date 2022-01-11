<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchController;
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
    if (session()->has('user')) {
        return redirect('/login_done');
    }
    return redirect('/no_login');
});
Route::get('/about', function () {
    if (session()->has('user')) {
        return view('aboutlogin');
    }
    return view('about');
});
Route::get('/help', function () {
    if (session()->has('user')) {
        return view('helplogin');
    }
    return view('help');
});
Route::get('/call', function () {
    if (session()->has('user')) {
        return view('helplogin2');
    }
    return view('help2');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/regis', function () {
    return view('regis');
});
Route::get('/forgot', function () {
    return view('forgotPassword');
});
Route::get('/logout', function () {
    session()->pull('user');
    return redirect('/');
});
Route::get('/login_done', [LoginController::class, 'login_done']);
Route::get('/no_login', [LoginController::class, 'no_login']);
Route::get('/edit', [LoginController::class, 'edit_data']);
Route::get('/myorder', [LoginController::class, 'myorder']);
Route::post('/login_data', [LoginController::class, 'login_data']);
Route::post('/register_data', [LoginController::class, 'regis_data']);
Route::post('/newpass', [LoginController::class, 'newpass']);
Route::post('/reset_data/{email}', [LoginController::class, 'reset_data']);
Route::post('/confirmtelp/{email}/{pass}', [LoginController::class, 'confirmtelp']);
Route::post('/cari_data', [SearchController::class, 'cari_data']);
Route::post('/home_page', [SearchController::class, 'home_page']);
Route::post('/filter/{airport}/{fromto}/{date}/{passanger}', [SearchController::class, 'filter']);
Route::post('/input/{date}/{passanger}/{RUTE_ID}', [SearchController::class, 'input']);
Route::post('/payment/{date}/{passanger}/{RUTE_ID}', [SearchController::class, 'payment']);
Route::post('/checkout/{date}/{passanger}/{RUTE_ID}/{penumpangnama}/{penumpangid}', [SearchController::class, 'checkout']);
Route::post('/save', [LoginController::class, 'save_data']);
Route::post('/update', [LoginController::class, 'update_data']);
Route::post('/detail/{BOOKINGID}', [LoginController::class, 'detail_order']);
Route::post('/insert/{RUTE_ID}/{date}/{total}/{nama}/{id}', [SearchController::class, 'insert_data']);
Route::get('/aboutus', function () {
    return view('aboutus');
});
