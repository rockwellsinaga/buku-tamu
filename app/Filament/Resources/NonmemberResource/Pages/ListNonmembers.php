<?php

namespace App\Filament\Resources\NonmemberResource\Pages;

use App\Filament\Resources\NonmemberResource;
use App\Filament\Resources\NonmemberResource\Widgets\StatsOverview;
use Filament\Resources\Pages\ListRecords;

class ListNonmembers extends ListRecords
{
    protected static string $resource = NonmemberResource::class;

    protected static ?string $title = 'Daftar Tamu Non Anggota';

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
