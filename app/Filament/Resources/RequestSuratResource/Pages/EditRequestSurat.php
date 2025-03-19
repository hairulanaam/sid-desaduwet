<?php

namespace App\Filament\Resources\RequestSuratResource\Pages;

use App\Filament\Resources\RequestSuratResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRequestSurat extends EditRecord
{
    protected static string $resource = RequestSuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
