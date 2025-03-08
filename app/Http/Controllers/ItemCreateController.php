<?php

namespace App\Http\Controllers;

use App\Models\Category;

class ItemCreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('layout.items.create', compact('categories'));
    }
}
