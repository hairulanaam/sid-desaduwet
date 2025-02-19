<?php

namespace App\Filament\Resources\LembagaDesaResource\Pages;

use App\Filament\Resources\LembagaDesaResource;
use App\Models\LembagaDesa;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLembagaDesa extends EditRecord
{
    protected static string $resource = LembagaDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
