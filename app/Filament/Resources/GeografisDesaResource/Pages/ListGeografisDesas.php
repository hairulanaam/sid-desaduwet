<?php

namespace App\Filament\Resources\GeografisDesaResource\Pages;

use App\Filament\Resources\GeografisDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeografisDesas extends ListRecords
{
    protected static string $resource = GeografisDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
