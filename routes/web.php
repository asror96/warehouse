<?php

use App\Http\Controllers\Item\ItemCreateController;
use App\Http\Controllers\Item\ItemDestroyController;
use App\Http\Controllers\Item\ItemEditController;
use App\Http\Controllers\Item\ItemListController;
use App\Http\Controllers\Item\ItemStoreController;
use App\Http\Controllers\Item\ItemUpdateController;
use App\Http\Controllers\Item\ShowItemController;
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\Request\RequestController;
use App\Http\Controllers\Request\RequestDestroyController;
use App\Http\Controllers\Request\RequestEditController;
use App\Http\Controllers\Request\RequestStoreController;
use App\Http\Controllers\Request\RequestUpdateController;
use App\Http\Controllers\Request\ShowRequestController;
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