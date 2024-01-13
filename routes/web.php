<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CronController;
use App\Http\Controllers\ArtisanController;

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
    //return view('welcome');
    return view('components.home.index');
});

Route::get("/crond",  [CronController::class, 'pushData']);
Route::get("/debug/optimize",  [ArtisanController::class, 'artisanOptimize']);
Route::get("/debug/clear",  [ArtisanController::class, 'artisanClear']);
