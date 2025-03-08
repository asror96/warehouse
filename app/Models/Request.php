<?php

namespace App\Models;

use App\Enums\RequestStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'status',
        'total_price',
        'item_id',
        'description',
        'crated_at'
    ];

    protected $casts = [
        'status' => RequestStatus::class,
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
