<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ims/subscriber/{phoneNumber}', [App\Http\Controllers\SubscriberController::class, 'index'])->name('viewSubs');
Route::get('/ims/subscriber/edit/{phoneNumber}', [App\Http\Controllers\SubscriberController::class, 'edit'])->name('editSubs');

Route::post('/ims/subscriber', [App\Http\Controllers\SubscriberController::class, 'store'])->name('createSubs');
Route::put('/ims/subscriber/{phoneNumber}', [App\Http\Controllers\SubscriberController::class, 'update'])->name('updateSubs');
Route::post('/ims/subscriber/{phoneNumber}', [App\Http\Controllers\SubscriberController::class, 'destroy'])->name('deleteSubs');