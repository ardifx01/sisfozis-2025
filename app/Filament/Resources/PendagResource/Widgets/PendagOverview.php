<?php

namespace App\Filament\Resources\PendagResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PendagOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total Pendayagunaan', 'Rp ' . number_format(\App\Models\Pendag::where('status', 'Selesai')->sum('financial_aid'), 0, ',', '.')),
            Stat::make('Total Penerima Manfaat', \App\Models\Pendag::where('status', 'Selesai')->sum('total_benef')),
            Stat::make('Total Transaksi', \App\Models\Pendag::where('status', 'Selesai')->count()),
        ];
    }
}
