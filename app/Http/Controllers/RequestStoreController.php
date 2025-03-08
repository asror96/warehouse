<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;

class RequestStoreController extends Controller
{
    public function __invoke(HttpRequest $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string',
            'total_price' => 'required|numeric',
            'item_id' => 'required|exists:items,id',
            'description' => 'nullable|string'
        ]);

        Request::create([
            'customer_name' => $data['customer_name'],
            'status' => 'pending',
            'total_price' => $data['total_price'],
            'item_id' => $data['item_id'],
            'description' => $data['description'] ?? null,
        ]);

        return redirect()->route('requests.list')->with('success', 'Заявка успешно создана!');
    }
}
