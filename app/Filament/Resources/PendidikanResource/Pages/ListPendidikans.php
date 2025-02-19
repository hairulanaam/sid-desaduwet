<?php

namespace App\Filament\Resources\PendidikanResource\Pages;

use App\Filament\Resources\PendidikanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendidikans extends ListRecords
{
    protected static string $resource = PendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
