<?php

declare(strict_types = 1);

namespace App\Models;

use App\Enums\RequestStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'status',
        'total_price',
        'item_id',
        'description',
        'crated_at',
    ];

    protected $casts = [
        'status' => RequestStatus::class,
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
