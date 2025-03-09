<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Item;

use App\Http\Controllers\BaseController\Controller;
use App\Models\Item;
use App\Service\ItemService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

final class ItemEditController extends Controller
{
    public function __construct(
        private readonly ItemService $service
    ) {}

    public function __invoke(Item $item): Factory|View|Application
    {
        return $this->service->edit($item);
    }
}
