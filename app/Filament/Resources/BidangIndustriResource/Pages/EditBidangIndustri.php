<?php

namespace App\Filament\Resources\BidangIndustriResource\Pages;

use App\Filament\Resources\BidangIndustriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBidangIndustri extends EditRecord
{
    protected static string $resource = BidangIndustriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
