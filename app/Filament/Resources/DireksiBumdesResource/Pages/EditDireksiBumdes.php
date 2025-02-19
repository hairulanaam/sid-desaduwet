<?php

namespace App\Filament\Resources\DireksiBumdesResource\Pages;

use App\Filament\Resources\DireksiBumdesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDireksiBumdes extends EditRecord
{
    protected static string $resource = DireksiBumdesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
