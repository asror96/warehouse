<?php

declare(strict_types = 1);

namespace App\Enums;

enum RequestStatus: string
{
    case Pending = 'pending';
    case Completed = 'completed';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Новый',
            self::Completed => 'Выполнен',
        };
    }
}
