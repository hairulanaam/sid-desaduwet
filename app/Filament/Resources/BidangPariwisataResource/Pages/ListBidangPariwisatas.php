<?php

namespace App\Filament\Resources\BidangPariwisataResource\Pages;

use App\Filament\Resources\BidangPariwisataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBidangPariwisatas extends ListRecords
{
    protected static string $resource = BidangPariwisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
