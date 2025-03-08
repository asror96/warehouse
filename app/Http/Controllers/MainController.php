<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __invoke()
    {
        return view('layout.main');
    }
}
