<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Item;

use App\Http\Controllers\BaseController\Controller;
use App\Http\Requests\Item\ItemUpdateRequest;
use App\Models\Item;
use App\Service\ItemService;
use Illuminate\Http\RedirectResponse;

final class ItemUpdateController extends Controller
{
    public function __construct(
        private readonly ItemService $service
    ) {}

    public function __invoke(ItemUpdateRequest $request, Item $item): RedirectResponse
    {
        return $this->service->update($request, $item);
    }
}
