<?php

namespace App\Filament\Resources\PeraturanGubernurResource\Pages;

use App\Filament\Resources\PeraturanGubernurResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeraturanGubernur extends EditRecord
{
    protected static string $resource = PeraturanGubernurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
