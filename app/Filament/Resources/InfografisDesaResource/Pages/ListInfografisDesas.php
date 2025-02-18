<?php

namespace App\Filament\Resources\InfografisDesaResource\Pages;

use App\Filament\Resources\InfografisDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInfografisDesas extends ListRecords
{
    protected static string $resource = InfografisDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
