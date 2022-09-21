<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuickSortController;
use App\Http\Controllers\BubbleSortController;

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

Route::get('/quick_sort', [QuickSortController::class, 'list'])->name('quick_sort');

Route::get('/bubble_sort', [BubbleSortController::class, 'list'])->name('bubble_sort');
