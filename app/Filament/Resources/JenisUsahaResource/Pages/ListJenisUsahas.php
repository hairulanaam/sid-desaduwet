<?php

namespace App\Filament\Resources\JenisUsahaResource\Pages;

use App\Filament\Resources\JenisUsahaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenisUsahas extends ListRecords
{
    protected static string $resource = JenisUsahaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
