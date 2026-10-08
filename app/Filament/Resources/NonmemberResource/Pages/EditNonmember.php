<?php

namespace App\Filament\Resources\NonmemberResource\Pages;

use App\Filament\Resources\NonmemberResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNonmember extends EditRecord
{
    protected static string $resource = NonmemberResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
