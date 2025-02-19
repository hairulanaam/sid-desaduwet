<?php

namespace App\Filament\Resources\BidangPertanianResource\Pages;

use App\Filament\Resources\BidangPertanianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBidangPertanian extends EditRecord
{
    protected static string $resource = BidangPertanianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
