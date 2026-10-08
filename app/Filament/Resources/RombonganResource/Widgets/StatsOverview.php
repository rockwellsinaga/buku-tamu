<?php

namespace App\Filament\Resources\RombonganResource\Widgets;

use App\Models\GroupVisit;
use Filament\Widgets\Widget;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    //protected static string $view = 'filament.resources.rombongan-resource.widgets.stats-overview';

    protected function getStats(): array
    {
        return [
            Stat::make('Rombongan', GroupVisit::query()->count())
             ->description('Total Rombongan')
             ->descriptionIcon('heroicon-s-trending-up')
        ];
    }
}
