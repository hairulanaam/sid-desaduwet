<?php

namespace App\Filament\Resources\InformasiDesaResource\Pages;

use App\Filament\Resources\InformasiDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInformasiDesa extends EditRecord
{
    protected static string $resource = InformasiDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
