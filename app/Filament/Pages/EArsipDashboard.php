<?php

namespace App\Filament\Pages;

use App\Filament\Resources\SuratMasukResource\Widgets\SuratMasukOverview;
use App\Filament\Widgets\SuratStatsOverview;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Dashboard;

class EArsipDashboard extends Dashboard
{
    use HasPageShield;

    protected static ?string $title = 'E-Arsip Dashboard';
    protected static string $view = 'filament.pages.e-arsip-dashboard';
    protected static string $routePath = 'e-arsip';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected function getHeaderWidgets(): array
    {
        return [
            SuratStatsOverview::class,
        ];
    }
}
