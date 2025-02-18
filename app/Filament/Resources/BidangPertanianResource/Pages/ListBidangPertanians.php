<?php

namespace App\Filament\Resources\BidangPertanianResource\Pages;

use App\Filament\Resources\BidangPertanianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBidangPertanians extends ListRecords
{
    protected static string $resource = BidangPertanianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
