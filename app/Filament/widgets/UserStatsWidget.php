<?php

namespace App\Filament\Widgets;

use App\Models\Pengguna;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class UserStatsWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Pengguna', Pengguna::count()),
            Card::make('Pengguna Aktif', Pengguna::where('is_active', true)->count()),
        ];
    }
}
