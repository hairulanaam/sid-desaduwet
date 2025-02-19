<?php

namespace App\Filament\Resources\BantuanSiswaMiskinResource\Pages;

use App\Filament\Resources\BantuanSiswaMiskinResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBantuanSiswaMiskin extends EditRecord
{
    protected static string $resource = BantuanSiswaMiskinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
