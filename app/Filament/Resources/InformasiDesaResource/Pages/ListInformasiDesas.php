<?php

namespace App\Filament\Resources\InformasiDesaResource\Pages;

use App\Filament\Resources\InformasiDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInformasiDesas extends ListRecords
{
    protected static string $resource = InformasiDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
