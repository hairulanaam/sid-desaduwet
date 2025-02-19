<?php

namespace App\Filament\Resources\KelasSosialResource\Pages;

use App\Filament\Resources\KelasSosialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelasSosials extends ListRecords
{
    protected static string $resource = KelasSosialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
