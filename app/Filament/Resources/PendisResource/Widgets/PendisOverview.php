<?php

namespace App\Filament\Resources\PendisResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PendisOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total Pendistribusian', 'Rp ' . number_format(\App\Models\Pendis::where('status', 'Selesai')->sum('financial_aid'), 0, ',', '.')),
            Stat::make('Total Penerima Manfaat', \App\Models\Pendis::where('status', 'Selesai')->sum('total_benef')),
            Stat::make('Total Transaksi', \App\Models\Pendis::where('status', 'Selesai')->count()),
        ];
    }
}
