<?php

namespace App\Filament\Resources\StatusPerkawinanResource\Pages;

use App\Filament\Resources\StatusPerkawinanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatusPerkawinans extends ListRecords
{
    protected static string $resource = StatusPerkawinanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
