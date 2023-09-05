<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapeController;
use App\Console\Commands\ScrapeBooksCommand;
use Goutte\Client;
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


Route::get('/', [ScrapeController::class, 'index'])->name('all');
Route::get('/scrape', [App\Http\Controllers\ScrapeController::class, 'scrapeBooks'])->name('scrape');
Route::post('/scrape', [App\Http\Controllers\ScrapeController::class, 'scrapeBooks'])->name('scrape');
Route::get('/scrape/ajax', [App\Http\Controllers\ScrapeController::class, 'scrapeAjax'])->name('ajax');
Route::post('/scrape/ajax', [App\Http\Controllers\ScrapeController::class, 'scrapeAjax'])->name('ajax');