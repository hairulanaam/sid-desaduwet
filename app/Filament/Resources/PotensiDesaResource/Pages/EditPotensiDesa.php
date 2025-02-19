<?php

namespace App\Filament\Resources\PotensiDesaResource\Pages;

use App\Filament\Resources\PotensiDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPotensiDesa extends EditRecord
{
    protected static string $resource = PotensiDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
