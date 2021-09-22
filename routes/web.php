<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Select2Dropdown;
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

Route::post('api/fetch-states', [App\Http\Controllers\SignupController::class, 'fetchState']);
Route::post('api/fetch-cities', [App\Http\Controllers\SignupController::class, 'fetchCity']);
Route::get('/signup',[App\Http\Controllers\SignupController::class, 'create'])->name('signup');
Route::post('/addUser',[App\Http\Controllers\SignupController::class, 'store'])->name('addUser');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
