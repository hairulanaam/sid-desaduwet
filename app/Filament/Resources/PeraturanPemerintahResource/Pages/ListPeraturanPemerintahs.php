<?php

namespace App\Filament\Resources\PeraturanPemerintahResource\Pages;

use App\Filament\Resources\PeraturanPemerintahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeraturanPemerintahs extends ListRecords
{
    protected static string $resource = PeraturanPemerintahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
