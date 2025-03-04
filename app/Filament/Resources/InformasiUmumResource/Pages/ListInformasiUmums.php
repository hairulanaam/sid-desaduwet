<?php

namespace App\Filament\Resources\InformasiUmumResource\Pages;

use App\Filament\Resources\InformasiUmumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInformasiUmums extends ListRecords
{
    protected static string $resource = InformasiUmumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
