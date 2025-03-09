<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Item;

use App\Http\Controllers\BaseController\Controller;
use App\Http\Requests\Item\ItemStoreRequest;
use App\Service\ItemService;
use Illuminate\Http\RedirectResponse;

final class ItemStoreController extends Controller
{
    public function __construct(
        private readonly ItemService $service
    ) {}

    public function __invoke(ItemStoreRequest $request): RedirectResponse
    {
        return $this->service->store($request);
    }
}
