<?php

namespace App\Filament\Resources\BidangIndustriResource\Pages;

use App\Filament\Resources\BidangIndustriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBidangIndustris extends ListRecords
{
    protected static string $resource = BidangIndustriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
