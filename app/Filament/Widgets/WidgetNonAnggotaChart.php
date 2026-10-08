<?php

namespace App\Filament\Widgets;

use App\Filament\Widgets\Concerns\BuildsMonthlyVisitChart;
use App\Models\Visitor;
use Filament\Widgets\ChartWidget;

class WidgetNonAnggotaChart extends ChartWidget
{
    use BuildsMonthlyVisitChart;

    protected static ?string $heading = 'Kunjungan Nonanggota';

    protected function getData(): array
    {
        return $this->monthlyVisitData(Visitor::class, 'Nonanggota');
    }

    protected function getType(): string
    {
        return 'line';
    }
}
