<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('All Users', User::all()->count()),
            Stat::make('Consument', User::whereHasRole('consument')->count()),
            Stat::make('Rabbits', User::whereHasRole('marketing')->count()),
        ];
    }
}
