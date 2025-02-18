<?php

namespace App\Filament\Resources\GaleriKegiatanResource\Pages;

use App\Filament\Resources\GaleriKegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGaleriKegiatans extends ListRecords
{
    protected static string $resource = GaleriKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
