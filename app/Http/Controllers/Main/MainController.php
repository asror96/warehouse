<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Main;

use App\Http\Controllers\BaseController\Controller;
use App\Service\MainService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

final class MainController extends Controller
{
    public function __construct(
        private readonly MainService $service
    ) {}

    public function __invoke(): Factory|View|Application
    {
        return $this->service->main();
    }
}
