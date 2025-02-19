<?php

namespace App\Filament\Resources\KepalaKeluargaResource\Pages;

use App\Filament\Resources\KepalaKeluargaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKepalaKeluarga extends EditRecord
{
    protected static string $resource = KepalaKeluargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
