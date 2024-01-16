<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CronController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsPostController;

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

Route::get('/', HomeController::class)->name('home');
Route::get("/getnews",  [NewsPostController::class, 'getNews']);

Route::get("/crond",  [CronController::class, 'pushData']);
Route::get("/debug/optimize",  [ArtisanController::class, 'artisanOptimize']);
Route::get("/debug/clear",  [ArtisanController::class, 'artisanClear']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
