<?php

namespace App\Filament\Resources\ProgramKeluargaHarapanResource\Pages;

use App\Filament\Resources\ProgramKeluargaHarapanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProgramKeluargaHarapans extends ListRecords
{
    protected static string $resource = ProgramKeluargaHarapanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
