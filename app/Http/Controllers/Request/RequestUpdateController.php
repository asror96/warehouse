<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Request;

use App\Http\Controllers\BaseController\Controller;
use App\Http\Requests\Request\RequestUpdateRequest;
use App\Models\Request;
use App\Service\RequestService;
use Illuminate\Http\RedirectResponse;

final class RequestUpdateController extends Controller
{
    public function __construct(
        private readonly RequestService $service
    ) {}

    public function __invoke(RequestUpdateRequest $httpRequest, Request $request): RedirectResponse
    {
        return $this->service->update($httpRequest, $request);
    }
}
