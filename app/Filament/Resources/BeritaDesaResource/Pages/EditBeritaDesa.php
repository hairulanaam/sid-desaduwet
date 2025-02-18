<?php

namespace App\Filament\Resources\BeritaDesaResource\Pages;

use App\Filament\Resources\BeritaDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBeritaDesa extends EditRecord
{
    protected static string $resource = BeritaDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
