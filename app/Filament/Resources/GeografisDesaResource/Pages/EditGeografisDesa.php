<?php

namespace App\Filament\Resources\GeografisDesaResource\Pages;

use App\Filament\Resources\GeografisDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGeografisDesa extends EditRecord
{
    protected static string $resource = GeografisDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
