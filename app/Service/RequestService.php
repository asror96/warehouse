<?php

declare(strict_types = 1);

namespace App\Service;

use App\Http\Requests\Request\RequestStoreRequest;
use App\Http\Requests\Request\RequestUpdateRequest;
use App\Models\Item;
use App\Models\Request;
use App\Models\Request as RequestModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class RequestService
{
    public function store(RequestStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Request::query()->create([
            'customer_name' => $data['customer_name'],
            'status' => 'pending',
            'total_price' => $data['total_price'],
            'item_id' => $data['item_id'],
            'description' => $data['description'] ?? null,
        ]);

        return redirect()->route('requests.list')->with('success', 'Заявка успешно создана!');
    }

    public function edit(Request $request): Factory|View|Application
    {
        $items = Item::all();

        return view('layout.requests.edit', compact( 'request',  'items'));
    }

    public function update(RequestUpdateRequest $httpRequest, Request $request): RedirectResponse
    {
        $data = $httpRequest->validated();
        $item = Item::query()->find($data['item_id']);
        $data['total_price'] = $item->price;
        $request->update($data);

        return redirect()->route('requests.list')->with('success', 'Заявка успешно обновлена!');
    }

    public function destroy(RequestModel $request): RedirectResponse
    {
        $request->delete();

        return redirect()->route('requests.list')->with('success', 'Товар успешно удален!');
    }
}
