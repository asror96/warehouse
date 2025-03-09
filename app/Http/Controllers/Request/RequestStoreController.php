<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Request;

use App\Http\Controllers\BaseController\Controller;
use App\Http\Requests\Request\RequestStoreRequest;
use App\Service\RequestService;
use Illuminate\Http\RedirectResponse;

final class RequestStoreController extends Controller
{
    public function __construct(
        private readonly RequestService $service
    ) {}

    public function __invoke(RequestStoreRequest $request): RedirectResponse
    {
        return $this->service->store($request);
    }
}
