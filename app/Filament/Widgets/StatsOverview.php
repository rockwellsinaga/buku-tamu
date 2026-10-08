<?php

namespace App\Filament\Widgets;

use App\Models\GroupVisit;
use App\Models\Member;
use App\Models\Visitor;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Anggota', Member::query()->count())
            ->description('Total Anggota')
            ->descriptionIcon('heroicon-s-trending-up'),
           Stat::make('Non Anggota', Visitor::query()->count())
            ->description('Total Non Anggota')
            ->descriptionIcon('heroicon-s-trending-up'),
            Stat::make('Rombongan', GroupVisit::query()->count())
            ->description('Total Rombongan')
            ->descriptionIcon('heroicon-s-trending-up'),
        ];
    }
}
