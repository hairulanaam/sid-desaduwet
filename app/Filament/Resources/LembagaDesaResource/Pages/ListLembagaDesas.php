<?php

namespace App\Filament\Resources\LembagaDesaResource\Pages;

use App\Filament\Resources\LembagaDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLembagaDesas extends ListRecords
{
    protected static string $resource = LembagaDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
