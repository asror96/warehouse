<?php

use App\Http\Controllers\ItemCreateController;
use App\Http\Controllers\ItemDestroyController;
use App\Http\Controllers\ItemEditController;
use App\Http\Controllers\ItemListController;
use App\Http\Controllers\ItemStoreController;
use App\Http\Controllers\ItemUpdateController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RequestDestroyController;
use App\Http\Controllers\RequestEditController;
use App\Http\Controllers\RequestStoreController;
use App\Http\Controllers\RequestUpdateController;
use App\Http\Controllers\ShowItemController;
use App\Http\Controllers\ShowRequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|ItemCreateController
*/
//Main
Route::get('/', MainController::class)->name('main');

//Item
Route::get('/items', ItemListController::class)->name('items.list');
Route::get('/items/create', ItemCreateController::class)->name('items.create');
Route::post('/items', ItemStoreController::class)->name('items.store');
Route::get('/items/{item}/edit', ItemEditController::class )->name('items.edit');
Route::put('/items/{item}', ItemUpdateController::class)->name('items.update');
Route::delete('/items/{item}', ItemDestroyController::class)->name('items.destroy');
Route::get('/items/{id}', ShowItemController::class)->name('items.show');

//request
Route::post('/requests', RequestStoreController::class)->name('requests.store');
Route::get('/requests', RequestStoreController::class)->name('requests.show');
Route::get('/requests/{request}/edit', RequestEditController::class)->name('requests.edit');
Route::put('/requests/{request}', RequestUpdateController::class)->name('requests.update');
Route::get('/requests', RequestController::class)->name('requests.list');
Route::get('/requests/{id}', ShowRequestController::class)->name('requests.show');
Route::delete('/request/{request}',RequestDestroyController::class)->name('requests.destroy');