<?php

namespace App\Filament\Resources\RombonganResource\Pages;

use App\Filament\Resources\RombonganResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRombongan extends EditRecord
{
    protected static string $resource = RombonganResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
