<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SuratStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Surat Masuk', \App\Models\SuratMasuk::count()),
            Stat::make('Total Surat Keluar', \App\Models\SuratKeluar::count()),
        ];
    }
}
