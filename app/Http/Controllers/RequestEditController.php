<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Request;

class RequestEditController extends Controller
{
    public function __invoke(Request $request)
    {
        $items = Item::all(); // Получаем список товаров для выпадающего списка
        return view('layout.requests.edit', compact('request', 'items'));
    }
}
