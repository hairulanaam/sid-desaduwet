<?php

namespace App\Filament\Resources\PeraturanPemerintahResource\Pages;

use App\Filament\Resources\PeraturanPemerintahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeraturanPemerintah extends EditRecord
{
    protected static string $resource = PeraturanPemerintahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
