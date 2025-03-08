<?php

namespace App\Http\Controllers;



use App\Models\Request as RequestModel;

class RequestDestroyController extends Controller
{
    public function __invoke(RequestModel $request)
    {
        $request->delete();
        return redirect()->route('requests.list')->with('success', 'Товар успешно удален!');
    }
}