<?php

namespace App\Filament\Widgets;

use App\Filament\Widgets\Concerns\BuildsMonthlyVisitChart;
use App\Models\Member;
use Filament\Widgets\ChartWidget;

class WidgetAnggotaChart extends ChartWidget
{
    use BuildsMonthlyVisitChart;

    protected static ?string $heading = 'Kunjungan Anggota';

    protected function getData(): array
    {
        return $this->monthlyVisitData(Member::class, 'Anggota');
    }

    protected function getType(): string
    {
        return 'line';
    }
}
