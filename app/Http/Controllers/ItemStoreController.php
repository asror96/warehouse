<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemStoreController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\RedirectResponse
    {

        // Валидация данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Создание товара
        Item::create($validatedData);

        return redirect()->route('items.list')->with('success', 'Товар успешно создан!');
    }
}
