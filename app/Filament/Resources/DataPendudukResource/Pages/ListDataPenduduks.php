<?php

namespace App\Filament\Resources\DataPendudukResource\Pages;

use App\Filament\Resources\DataPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataPenduduks extends ListRecords
{
    protected static string $resource = DataPendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
