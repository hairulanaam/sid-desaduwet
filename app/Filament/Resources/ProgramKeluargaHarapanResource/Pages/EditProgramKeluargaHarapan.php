<?php

namespace App\Filament\Resources\ProgramKeluargaHarapanResource\Pages;

use App\Filament\Resources\ProgramKeluargaHarapanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramKeluargaHarapan extends EditRecord
{
    protected static string $resource = ProgramKeluargaHarapanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
