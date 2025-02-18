<?php

namespace App\Filament\Resources\UspDesaResource\Pages;

use App\Filament\Resources\UspDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUspDesa extends EditRecord
{
    protected static string $resource = UspDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
