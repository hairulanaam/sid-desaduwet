<?php

namespace App\Filament\Resources\GiziBurukResource\Pages;

use App\Filament\Resources\GiziBurukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGiziBuruks extends ListRecords
{
    protected static string $resource = GiziBurukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
