<?php

namespace App\Filament\Resources\JamkesmasResource\Pages;

use App\Filament\Resources\JamkesmasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJamkesmas extends EditRecord
{
    protected static string $resource = JamkesmasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
