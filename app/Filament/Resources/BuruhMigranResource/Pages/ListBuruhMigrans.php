<?php

namespace App\Filament\Resources\BuruhMigranResource\Pages;

use App\Filament\Resources\BuruhMigranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBuruhMigrans extends ListRecords
{
    protected static string $resource = BuruhMigranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
