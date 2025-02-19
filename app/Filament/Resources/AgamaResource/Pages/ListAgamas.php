<?php

namespace App\Filament\Resources\AgamaResource\Pages;

use App\Filament\Resources\AgamaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAgamas extends ListRecords
{
    protected static string $resource = AgamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
