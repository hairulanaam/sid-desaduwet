<?php

namespace App\Filament\Resources\DireksiBumdesResource\Pages;

use App\Filament\Resources\DireksiBumdesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDireksiBumdes extends ListRecords
{
    protected static string $resource = DireksiBumdesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
