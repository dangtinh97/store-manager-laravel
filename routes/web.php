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
    return view('blank');
})->name('dashboard')->middleware('auth');


Route::get('login',[\App\Http\Controllers\Auth\AuthController::class,'login'])->name('login');
Route::post('login',[\App\Http\Controllers\Auth\AuthController::class,'attempt'])->name('attempt.login');
Route::get('logout',[\App\Http\Controllers\Auth\AuthController::class,'logout'])->name('logout');
//Route::prefix('accounts')->name('accounts.')->middleware('auth')->group(function (){
//    Route::get('/',[\App\Http\Controllers\AdminController::class,'index']);
//});

Route::resource('admins',\App\Http\Controllers\AdminController::class)->middleware(['auth','can:SUPPER_ADMIN|MANAGER']);
Route::resource('projects',\App\Http\Controllers\ProjectController::class)->middleware('auth');
Route::resource('users',\App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('contracts',\App\Http\Controllers\ContractContrller::class)->middleware('auth');
Route::resource('delivery-notes',\App\Http\Controllers\DeliveryNoteController::class)->middleware('auth');
Route::get('bill/{id}/print',[\App\Http\Controllers\DeliveryNoteController::class,'printBill'])->middleware('auth')->name('bill.print');
Route::get('contracts/{id}/download',[\App\Http\Controllers\ContractContrller::class,'download'])
    ->name('contracts.download')
    ->middleware('auth');
