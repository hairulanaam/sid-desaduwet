<?php

namespace App\Filament\Resources\PetaDesaResource\Pages;

use App\Filament\Resources\PetaDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPetaDesa extends EditRecord
{
    protected static string $resource = PetaDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
