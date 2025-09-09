<?php

namespace App\Filament\Resources\PendagResource\Pages;

use App\Filament\Resources\PendagResource;
use App\Models\Pendag;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPendag extends ListRecords
{
    protected static string $resource = PendagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua program'),
            'Ekonomi' => Tab::make('Cianjur Makmur')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('program', 'Ekonomi'))
                ->badge(Pendag::query()->where('program', 4)->count())
                ->badgeColor('success'),
            'Pendidikan' => Tab::make('Cianjur Cerdas')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('program', 'Pendidikan'))
                ->badge(Pendag::query()->where('program', 2)->count())
                ->badgeColor('warning'),
            'Kesehatan' => Tab::make('Cianjur Sehat')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('program',  'Kesehatan'))
                ->badge(Pendag::query()->where('program', 3)->count())
                ->badgeColor('danger'),
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [
            PendagResource\Widgets\PendagOverview::class,
        ];
    }
}
