<?php

namespace App\Filament\Resources\UnduhanResource\Pages;

use App\Filament\Resources\UnduhanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUnduhans extends ListRecords
{
    protected static string $resource = UnduhanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
