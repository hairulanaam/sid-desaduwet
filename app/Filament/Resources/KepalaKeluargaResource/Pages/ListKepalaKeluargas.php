<?php

namespace App\Filament\Resources\KepalaKeluargaResource\Pages;

use App\Filament\Resources\KepalaKeluargaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKepalaKeluargas extends ListRecords
{
    protected static string $resource = KepalaKeluargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
