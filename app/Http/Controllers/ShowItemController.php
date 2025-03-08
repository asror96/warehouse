<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ShowItemController extends Controller
{
    public function __invoke($id)
    {
        $item = Item::findOrFail($id);
        return view('layout.items.show', compact('item'));
    }
}
