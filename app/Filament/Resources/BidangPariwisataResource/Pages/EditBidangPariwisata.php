<?php

namespace App\Filament\Resources\BidangPariwisataResource\Pages;

use App\Filament\Resources\BidangPariwisataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBidangPariwisata extends EditRecord
{
    protected static string $resource = BidangPariwisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
