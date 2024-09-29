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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/services', [\App\Http\Controllers\ServiceController::class, 'index'])->name('services');
Route::get('/who-we-are', [\App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/partners', [\App\Http\Controllers\PartnerController::class, 'index'])->name('partners');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/lets-talk-submit', [\App\Http\Controllers\LetsTalkController::class, 'submit'])->name('lets.talk.submit');
Route::get('/lets-talk', [\App\Http\Controllers\LetsTalkController::class, 'index'])->name('lets.talk');
Route::get('/privace-policy', [\App\Http\Controllers\PrivacePolicyController::class, 'index'])->name('policy');



Route::group(['prefix' => 'cadmin'], function () {
    Voyager::routes();
});
