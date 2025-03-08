<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemUpdateController extends Controller
{
    public function __invoke(Request $request, Item $item)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Обновление товара
        $item->update($validatedData);

        return redirect()->route('items.list')->with('success', 'Товар успешно обновлен!');
    }
}
