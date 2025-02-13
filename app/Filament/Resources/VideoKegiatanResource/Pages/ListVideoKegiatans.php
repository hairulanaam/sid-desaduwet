<?php

namespace App\Filament\Resources\VideoKegiatanResource\Pages;

use App\Filament\Resources\VideoKegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVideoKegiatans extends ListRecords
{
    protected static string $resource = VideoKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
