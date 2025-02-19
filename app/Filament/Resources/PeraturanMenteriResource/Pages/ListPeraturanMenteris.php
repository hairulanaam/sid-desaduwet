<?php

namespace App\Filament\Resources\PeraturanMenteriResource\Pages;

use App\Filament\Resources\PeraturanMenteriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeraturanMenteris extends ListRecords
{
    protected static string $resource = PeraturanMenteriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
