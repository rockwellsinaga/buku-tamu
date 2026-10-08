<?php

namespace App\Filament\Resources\AnggotaResource\Widgets;

use App\Models\Member;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    //protected static string $view = 'filament.resources.anggota-resource.widgets.stats-overview';

    protected function getStats(): array
    {
        return [
            Stat::make('Anggota', Member::query()->count())
             ->description('Total Anggota')
             ->descriptionIcon('heroicon-s-trending-up')
        ];
    }
}
