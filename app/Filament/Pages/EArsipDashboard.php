<?php

namespace App\Filament\Pages;

use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Dashboard;

class EArsipDashboard extends Dashboard
{
    use HasPageShield;

    protected static ?string $title = 'E-Arsip Dashboard';
    protected static string $view = 'filament.pages.e-arsip-dashboard';
    protected static string $routePath = 'e-arsip';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
}
