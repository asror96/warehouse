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
Route::get(uri: '/', action: MainController::class)->name(name: 'main');

//Item
Route::prefix('/items')->group(function () {
    Route::get(uri: '/', action: ItemListController::class)->name(name: 'items.list');
    Route::get(uri: '/{id}', action: ShowItemController::class)->name(name: 'items.show');
    Route::get(uri: '/create', action: ItemCreateController::class)->name(name: 'items.create');
    Route::post(uri: '/', action: ItemStoreController::class)->name(name: 'items.store');
    Route::get(uri: '/{item}/edit', action: ItemEditController::class)->name(name: 'items.edit');
    Route::put(uri: '/{item}', action: ItemUpdateController::class)->name(name: 'items.update');
    Route::delete(uri: '/{item}', action: ItemDestroyController::class)->name(name: 'items.destroy');
});

//request
Route::prefix('/requests')->group(function () {
    Route::get(uri: '/', action: RequestController::class)->name(name: 'requests.list');
    Route::get(uri: '/{id}', action: ShowRequestController::class)->name(name: 'requests.show');
    Route::post(uri: '/', action: RequestStoreController::class)->name(name: 'requests.store');
    Route::get(uri: '/{request}/edit', action: RequestEditController::class)->name(name: 'requests.edit');
    Route::put(uri: '/{request}', action: RequestUpdateController::class)->name(name: 'requests.update');
    Route::delete(uri: '/{request}', action: RequestDestroyController::class)->name(name: 'requests.destroy');
});