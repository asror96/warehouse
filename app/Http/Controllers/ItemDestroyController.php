<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ItemDestroyController extends Controller
{
    public function __invoke(Item $item)
    {
        $item->delete();
        return redirect()->route('items.list')->with('success', 'Товар успешно удален!');
    }
}