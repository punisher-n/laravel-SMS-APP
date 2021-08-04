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

Route::get('/debug', function () {
    return view('debug');
});

Route::get('/sendSms', function(){

    $phone = str_replace("+", "", "255693073832");
    $sms_message = "test intergration";

    //dispatch job for calling a service for send sms

    \App\Jobs\Notifications\SendSms::dispatch($phone, strip_tags($sms_message));
    return 'Sending sms through this route';
});
