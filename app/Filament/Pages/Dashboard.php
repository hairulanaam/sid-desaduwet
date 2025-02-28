<?php

namespace App\Filament\Pages;


use App\Filament\Widgets\StatistikDesa;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';


    protected function getHeaderWidgets(): array
    {
        return [
            StatistikDesa::class, // Menampilkan hanya StatistikDesa
        ];
    }

    public function getWidgets(): array
    {
        return []; // Menghapus semua widget bawaan Filament
    }
}
