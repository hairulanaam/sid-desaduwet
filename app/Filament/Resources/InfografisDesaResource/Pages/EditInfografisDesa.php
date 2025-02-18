<?php

namespace App\Filament\Resources\InfografisDesaResource\Pages;

use App\Filament\Resources\InfografisDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInfografisDesa extends EditRecord
{
    protected static string $resource = InfografisDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
