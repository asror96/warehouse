<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Request;

use App\Http\Controllers\BaseController\Controller;
use App\Models\Request as RequestModel;
use App\Service\RequestService;
use Illuminate\Http\RedirectResponse;

final class RequestDestroyController extends Controller
{
    public function __construct(
        private readonly RequestService $service
    ) {}

    public function __invoke(RequestModel $request): RedirectResponse
    {
        return $this->service->destroy($request);
    }
}
