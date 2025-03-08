<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ItemListController extends Controller
{
    public function __invoke()
    {
        $items = Item::all();
        return view('layout.items.list')->with('items', $items)->with('title','Товары');
    }
}
