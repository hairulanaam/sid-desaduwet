<?php

namespace App\Filament\Resources\BidangPerkebunanResource\Pages;

use App\Filament\Resources\BidangPerkebunanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBidangPerkebunan extends EditRecord
{
    protected static string $resource = BidangPerkebunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
