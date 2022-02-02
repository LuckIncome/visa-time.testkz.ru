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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::post('/feedback', [\App\Http\Controllers\FeedbackController::class,'feedback'])->name('feedback');
Route::post('/subscribe', [\App\Http\Controllers\FeedbackController::class,'subscribe'])->name('subscribe');

Route::prefix('blog')->group(function () {
    Route::get('/', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog');
    Route::get('/{article}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
    Route::get('/cat/{countries}', [\App\Http\Controllers\BlogController::class, 'show_cat'])->name('blog.show_cat');
});

Route::get('/visa', [\App\Http\Controllers\VisaController::class, 'index'])->name('visa');
Route::get('/visa/{article}', [\App\Http\Controllers\VisaController::class, 'show'])->name('visa.show');

Route::get('/{page?}',[\App\Http\Controllers\PagesController::class,'getPage'])->name('pages.get');