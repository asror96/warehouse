<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;

class ItemEditController extends Controller
{
    public function __invoke(Item $item)
    {
        $categories = Category::all();
        return view('layout.items.edit', compact('item', 'categories'));
    }
}
