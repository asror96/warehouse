<?php

declare(strict_types=1);

namespace App\Service;

use App\Http\Requests\Item\ItemStoreRequest;
use App\Http\Requests\Item\ItemUpdateRequest;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class ItemService
{
    public function list(): Factory|View|Application
    {
        $items = Item::all();

        return view('layout.items.list')->with('items', $items)->with('title', 'Товары');
    }

    public function create(): Factory|View|Application
    {
        $categories = Category::all();

        return view('layout.items.create', compact( 'categories'));
    }

    public function store(ItemStoreRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        Item::query()->create($validatedData);

        return redirect()->route('items.list')->with('success', 'Товар успешно создан!');
    }

    public function edit(Item $item): Application|Factory|View
    {
        $categories = Category::all();

        return view('layout.items.edit', compact( 'item', 'categories'));
    }

    public function update(ItemUpdateRequest $request, Item $item): RedirectResponse
    {
        $validatedData = $request->validated();
        $item->update($validatedData);

        return redirect()->route('items.list')->with('success', 'Товар успешно обновлен!');
    }

    public function destroy(Item $item): RedirectResponse
    {
        $item->delete();

        return redirect()->route('items.list')->with('success', 'Товар успешно удален!');
    }

    public function show($id): View
    {
        $item = Item::query()->findOrFail($id);

        return view('layout.items.show', compact('item'));
    }
}
