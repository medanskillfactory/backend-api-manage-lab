<?php

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

Route::get('home', 'Api\V1\UserController@home');

Route::get('qrcode', function () {
    return QrCode::size(250)
        ->generate('Testing qrcode');
});

Route::get('qrcode-with-image', function () {
    $image = \QrCode::format('png')
                    ->merge('putra-anda-logo.png', 0.5, true)
                    ->size(500)->errorCorrection('H')
                    ->generate('A simple example of QR code!');
    return response($image);
});

Route::get('qrcode-image', 'Api\V1\UserController@QrCode');
