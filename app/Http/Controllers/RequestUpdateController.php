<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\Item;
use Illuminate\Http\Request as HttpRequest;

class RequestUpdateController extends Controller
{
    public function __invoke(HttpRequest $httpRequest, Request $request)
    {

        $data = $httpRequest->validate([
            'customer_name' => 'required|string',
            'status' => 'required|string|in:pending,completed',
            'item_id' => 'required|exists:items,id',
            'description' => 'nullable|string',
        ]);


        $item = Item::find($data['item_id']);


        $data['total_price'] = $item->price;

        // Обновляем заявку
        $request->update($data);

        return redirect()->route('requests.list')->with('success', 'Заявка успешно обновлена!');
    }
}
