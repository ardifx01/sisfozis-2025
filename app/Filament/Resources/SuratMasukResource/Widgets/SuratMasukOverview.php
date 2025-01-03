<?php

namespace App\Filament\Resources\SuratMasukResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SuratMasukOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Surat Masuk', \App\Models\SuratMasuk::count()),
        ];
    }
}
