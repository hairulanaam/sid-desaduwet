<?php

namespace App\Filament\Resources\ProfilBumdesResource\Pages;

use App\Filament\Resources\ProfilBumdesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfilBumdes extends ListRecords
{
    protected static string $resource = ProfilBumdesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
