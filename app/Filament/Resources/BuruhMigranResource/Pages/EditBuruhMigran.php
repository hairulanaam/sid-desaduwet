<?php

namespace App\Filament\Resources\BuruhMigranResource\Pages;

use App\Filament\Resources\BuruhMigranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBuruhMigran extends EditRecord
{
    protected static string $resource = BuruhMigranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
