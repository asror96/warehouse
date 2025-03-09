<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Request;

use App\Http\Controllers\BaseController\Controller;
use App\Models\Request;
use App\Service\RequestService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

final class RequestEditController extends Controller
{
    public function __construct(
        private readonly RequestService $service
    ) {}

    public function __invoke(Request $request): Factory|View|Application
    {
        return $this->service->edit($request);
    }
}
