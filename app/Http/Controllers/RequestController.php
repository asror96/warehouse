<?php

namespace App\Http\Controllers;



use App\Models\Request;

class RequestController extends Controller
{
    public function __invoke()
    {
        $requests = Request::all();
        return view('layout.requests.index')->with(compact('requests'));
    }
}
