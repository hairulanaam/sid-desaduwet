<?php

namespace App\Filament\Resources\BeritaDesaResource\Pages;

use App\Filament\Resources\BeritaDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBeritaDesas extends ListRecords
{
    protected static string $resource = BeritaDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
