<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CronController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\FcmController;
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
/** By Bobby */
Route::get('/login', function () {
    // Validate the request...

    return redirect()->route('home');
});

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/policy', [HomeController::class,'policy'])->name('policy');
Route::get('/privacy', [HomeController::class,'privacy'])->name('privacy');
Route::get('/news', [NewsPostController::class,'index'])->name('news.index');
Route::get('/news/{news:slug}', [NewsPostController::class,'show'])->name('news.show');

Route::get('/news/category/{category}', [NewsPostController::class,'category'])->name('news.category');
Route::get('/news/search/{search}', [NewsPostController::class,'search'])->name('news.search');
Route::get('/news/tag/{tag}', [NewsPostController::class,'tag'])->name('news.tag');

Route::post('/settoken', [FcmController::class,'setToken'])->name('fcm.settoken');
Route::get('/settoken', [FcmController::class,'setToken'])->name('fcm.settoken');
Route::get('/sentnews', [FcmController::class,'sentNews'])->name('fcm.sentNews');


Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::get("/getnews",  [NewsPostController::class, 'getNews']);

Route::get("/crond",  [CronController::class, 'pushData']);
Route::get("/debug/optimize",  [ArtisanController::class, 'artisanOptimize']);
Route::get("/debug/clear",  [ArtisanController::class, 'artisanClear']);

Route::get("/testxml", [NewsPostController::class,'testxml'])->name('news.textxml');

/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/
