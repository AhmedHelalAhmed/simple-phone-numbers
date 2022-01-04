<?php

use App\Http\Controllers\PhoneNumberController;
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
    return response()->redirectTo(route('phone-numbers.index'));
});

Route::get('/phone-numbers', [PhoneNumberController::class, '__invoke'])
    ->name('phone-numbers.index');
