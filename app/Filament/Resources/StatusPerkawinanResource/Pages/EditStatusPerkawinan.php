<?php

namespace App\Filament\Resources\StatusPerkawinanResource\Pages;

use App\Filament\Resources\StatusPerkawinanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatusPerkawinan extends EditRecord
{
    protected static string $resource = StatusPerkawinanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
