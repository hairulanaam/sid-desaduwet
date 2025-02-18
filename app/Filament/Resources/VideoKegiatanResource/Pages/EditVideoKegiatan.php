<?php

namespace App\Filament\Resources\VideoKegiatanResource\Pages;

use App\Filament\Resources\VideoKegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVideoKegiatan extends EditRecord
{
    protected static string $resource = VideoKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
