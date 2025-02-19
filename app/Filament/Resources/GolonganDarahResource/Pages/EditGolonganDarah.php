<?php

namespace App\Filament\Resources\GolonganDarahResource\Pages;

use App\Filament\Resources\GolonganDarahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGolonganDarah extends EditRecord
{
    protected static string $resource = GolonganDarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
