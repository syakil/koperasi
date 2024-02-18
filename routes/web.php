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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/planActivity', [App\Http\Controllers\PlanActivityController::class, 'index'])->name('planActivity');
Route::get('/planActivity/create', [App\Http\Controllers\PlanActivityController::class, 'create'])->name('planActivity.create');
Route::post('/planActivity/store', [App\Http\Controllers\PlanActivityController::class, 'store'])->name('planActivity.store');



Route::get('management/wilayah', [App\Http\Controllers\ManagementWilayahController::class, 'index'])->name('management.wilayah.index');
Route::post('management/wilayah/area/create', [App\Http\Controllers\ManagementWilayahController::class, 'createArea'])->name('management.wilayah.area.create');
