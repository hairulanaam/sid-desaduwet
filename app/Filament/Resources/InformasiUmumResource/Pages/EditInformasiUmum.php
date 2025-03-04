<?php

namespace App\Filament\Resources\InformasiUmumResource\Pages;

use App\Filament\Resources\InformasiUmumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInformasiUmum extends EditRecord
{
    protected static string $resource = InformasiUmumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
