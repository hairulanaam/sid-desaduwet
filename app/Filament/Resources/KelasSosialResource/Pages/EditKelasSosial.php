<?php

namespace App\Filament\Resources\KelasSosialResource\Pages;

use App\Filament\Resources\KelasSosialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelasSosial extends EditRecord
{
    protected static string $resource = KelasSosialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
