<?php

namespace App\Filament\Resources\PeraturanBupatiResource\Pages;

use App\Filament\Resources\PeraturanBupatiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeraturanBupatis extends ListRecords
{
    protected static string $resource = PeraturanBupatiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
