<?php

namespace App\Filament\Widgets;

use App\Filament\Widgets\Concerns\BuildsMonthlyVisitChart;
use App\Models\GroupVisit;
use Filament\Widgets\ChartWidget;

class WidgetRombonganChart extends ChartWidget
{
    use BuildsMonthlyVisitChart;

    protected static ?string $heading = 'Kunjungan Rombongan';

    protected function getData(): array
    {
        return $this->monthlyVisitData(GroupVisit::class, 'Rombongan');
    }

    protected function getType(): string
    {
        return 'line';
    }
}
