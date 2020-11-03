<?php

use App\Models\Stat;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/statistics', function (Request $request) {
    $stat = Stat::where(['id' => 1,'ip' =>  '127.0.0.1'])->first();
    // dump($stat);
    return $stat;
});

Route::post('/clicks', function ()
{
    $ip = request('page');

    $stat = Stat::firstOrNew(['id' => 1,'ip' =>  '127.0.0.1']);
    $stat->clicks++;
    $stat->save();

    return 'clicked';
});
