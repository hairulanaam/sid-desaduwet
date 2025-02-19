<?php

namespace App\Filament\Resources\GiziBurukResource\Pages;

use App\Filament\Resources\GiziBurukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGiziBuruk extends EditRecord
{
    protected static string $resource = GiziBurukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
