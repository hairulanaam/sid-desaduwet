<?php

namespace App\Filament\Resources\UnduhanResource\Pages;

use App\Filament\Resources\UnduhanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUnduhan extends EditRecord
{
    protected static string $resource = UnduhanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
