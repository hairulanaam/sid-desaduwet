<?php

namespace App\Filament\Resources\PpidDesaResource\Pages;

use App\Filament\Resources\PpidDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPpidDesa extends EditRecord
{
    protected static string $resource = PpidDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
