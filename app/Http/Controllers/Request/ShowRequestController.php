<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Request;

use App\Http\Controllers\BaseController\Controller;

final class ShowRequestController extends Controller
{
    public function __invoke($id)
    {
        $request = \App\Models\Request::findOrFail($id);

        return view('layout.requests.show', compact('request'));
    }
}
