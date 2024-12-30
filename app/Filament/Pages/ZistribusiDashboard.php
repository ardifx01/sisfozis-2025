<?php

namespace App\Filament\Pages;

use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Dashboard;

class ZistribusiDashboard extends Dashboard
{

    use HasPageShield;
    protected static ?string $title = 'Zistribusi Dashboard';
    protected static string $view = 'filament.pages.zistribusi-dashboard';
    protected static string $routePath = 'zistribusi';
    protected static ?string $navigationIcon = 'heroicon-o-lifebuoy';
}
