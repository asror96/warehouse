<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Request;

use App\Http\Controllers\BaseController\Controller;
use App\Models\Request;

final class RequestController extends Controller
{
    public function __invoke()
    {
        $requests = Request::all();

        return view('layout.requests.index')->with(compact('requests'));
    }
}
