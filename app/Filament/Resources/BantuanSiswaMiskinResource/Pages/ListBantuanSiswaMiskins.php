<?php

namespace App\Filament\Resources\BantuanSiswaMiskinResource\Pages;

use App\Filament\Resources\BantuanSiswaMiskinResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBantuanSiswaMiskins extends ListRecords
{
    protected static string $resource = BantuanSiswaMiskinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
