<?php

namespace App\Filament\Resources\PotensiDesaResource\Pages;

use App\Filament\Resources\PotensiDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPotensiDesas extends ListRecords
{
    protected static string $resource = PotensiDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
