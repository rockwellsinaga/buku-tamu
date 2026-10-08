<?php

namespace App\Filament\Widgets\Concerns;

trait BuildsMonthlyVisitChart
{
    protected function monthlyVisitData(string $model, string $label): array
    {
        $counts = $model::query()
            ->whereBetween('created_at', [now()->startOfYear(), now()->endOfYear()])
            ->get(['created_at'])
            ->countBy(fn ($record) => $record->created_at->month);

        return [
            'datasets' => [[
                'label' => $label,
                'data' => collect(range(1, 12))->map(fn (int $month) => $counts->get($month, 0))->all(),
                'borderColor' => '#0f5d46',
                'backgroundColor' => 'rgba(15, 93, 70, 0.12)',
                'fill' => true,
                'tension' => 0.35,
            ]],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        ];
    }
}
