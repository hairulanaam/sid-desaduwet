<?php

namespace App\Filament\Resources\JumlahPendudukResource\Pages;

use App\Filament\Resources\JumlahPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJumlahPenduduks extends ListRecords
{
    protected static string $resource = JumlahPendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
