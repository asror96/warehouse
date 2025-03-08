<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ShowRequestController extends Controller
{
    public function __invoke($id)
    {
        $request= \App\Models\Request::findOrFail($id);
        return view('layout.requests.show', compact('request'));
    }
}
