<?php

namespace App\Filament\Resources\BidangPerkebunanResource\Pages;

use App\Filament\Resources\BidangPerkebunanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBidangPerkebunans extends ListRecords
{
    protected static string $resource = BidangPerkebunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
