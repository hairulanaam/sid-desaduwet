<?php
namespace App\Filament\Widgets;

use App\Models\JumlahPenduduk;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\KepalaKeluarga;
use App\Models\PerangkatDesa;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatistikDesa extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Stat::make('Jumlah Penduduk', JumlahPenduduk::sum('jumlah_penduduk'))
                ->color('primary')
                ->icon('heroicon-m-user-group'),

            Stat::make('Jumlah Kepala Keluarga', KepalaKeluarga::sum('jumlah_keluarga'))
                ->color('success')
                ->icon('heroicon-m-home'),

            Stat::make('Perangkat Desa', PerangkatDesa::count())
                ->color('warning')
                ->icon('heroicon-m-user'),
        ];
    }
}
