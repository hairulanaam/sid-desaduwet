<?php

namespace App\Filament\Resources\UndangUndangResource\Pages;

use App\Filament\Resources\UndangUndangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUndangUndang extends EditRecord
{
    protected static string $resource = UndangUndangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
