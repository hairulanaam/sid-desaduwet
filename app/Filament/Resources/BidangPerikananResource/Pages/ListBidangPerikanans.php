<?php

namespace App\Filament\Resources\BidangPerikananResource\Pages;

use App\Filament\Resources\BidangPerikananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBidangPerikanans extends ListRecords
{
    protected static string $resource = BidangPerikananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
