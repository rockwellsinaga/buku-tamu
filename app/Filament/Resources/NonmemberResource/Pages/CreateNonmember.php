<?php

namespace App\Filament\Resources\NonmemberResource\Pages;

use App\Filament\Resources\NonmemberResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNonmember extends CreateRecord
{
    protected static string $resource = NonmemberResource::class;
}
