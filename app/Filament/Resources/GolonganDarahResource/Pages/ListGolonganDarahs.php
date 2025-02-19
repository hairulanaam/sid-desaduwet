<?php

namespace App\Filament\Resources\GolonganDarahResource\Pages;

use App\Filament\Resources\GolonganDarahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGolonganDarahs extends ListRecords
{
    protected static string $resource = GolonganDarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
