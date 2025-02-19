<?php

namespace App\Filament\Resources\JenisUsahaResource\Pages;

use App\Filament\Resources\JenisUsahaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisUsaha extends EditRecord
{
    protected static string $resource = JenisUsahaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
