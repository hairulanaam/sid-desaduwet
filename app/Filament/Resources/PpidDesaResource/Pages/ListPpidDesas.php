<?php

namespace App\Filament\Resources\PpidDesaResource\Pages;

use App\Filament\Resources\PpidDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPpidDesas extends ListRecords
{
    protected static string $resource = PpidDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
