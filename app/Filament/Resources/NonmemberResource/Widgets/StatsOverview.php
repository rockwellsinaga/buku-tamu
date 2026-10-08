<?php

namespace App\Filament\Resources\NonmemberResource\Widgets;

use App\Models\Visitor;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    //protected static string $view = 'filament.resources.Nonmember-resource.widgets.stats-overview';

    protected function getStats(): array
    {
        return [
            Stat::make('Non Anggota', Visitor::query()->count())
             ->description('Total Non Anggota')
             ->descriptionIcon('heroicon-s-trending-up'),
        ];
    }
}
