<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Item;

use App\Http\Controllers\BaseController\Controller;
use App\Models\Item;
use App\Service\ItemService;
use Illuminate\Http\RedirectResponse;

final class ItemDestroyController extends Controller
{
    public function __construct(
        private readonly ItemService $service
    ) {}

    public function __invoke(Item $item): RedirectResponse
    {
        return $this->service->destroy($item);
    }
}
