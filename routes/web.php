<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BallController;
use App\Http\Controllers\BucketController;
use App\Http\Controllers\BucketSuggestionController;

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

Route::resource('buckets', BucketController::class);
Route::resource('balls', BallController::class);
Route::resource('bucket_suggestion', BucketSuggestionController::class);