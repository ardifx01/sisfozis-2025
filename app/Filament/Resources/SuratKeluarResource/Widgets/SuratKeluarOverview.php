<?php

namespace App\Filament\Resources\SuratKeluarResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SuratKeluarOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Surat Keluar', \App\Models\SuratKeluar::count()),
        ];
    }
}
