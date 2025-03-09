<?php

declare(strict_types = 1);

namespace App\Service;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

final class MainService
{
    public function main(): Factory|View|Application
    {
        return view(view: 'layout.main');
    }
}
