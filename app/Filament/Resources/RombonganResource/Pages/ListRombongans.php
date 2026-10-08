<?php

namespace App\Filament\Resources\RombonganResource\Pages;

use App\Filament\Resources\RombonganResource;
use App\Filament\Resources\RombonganResource\Widgets\StatsOverview;
use Filament\Resources\Pages\ListRecords;

class ListRombongans extends ListRecords
{
    protected static string $resource = RombonganResource::class;

    protected static ?string $title = 'Daftar Tamu Rombongan';

    protected function getActions(): array
    {
        return [
            // Records are created through the public guest form.
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
