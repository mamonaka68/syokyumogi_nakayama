<?php

use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
/* use App\Http\Controllers\AuthController; */
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

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/',[RegisterUserController::class,'punch'])
 ->middleware('auth','verified');

Route::post('/', [RegisterUserController::class, 'create']);
Route::middleware('auth')->group(function () {
    Route::get('/', [RegisterUserController::class, 'index']);
 });

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
Route::post('/work', [RegisterUserController::class, 'work'])
    ->name('work');