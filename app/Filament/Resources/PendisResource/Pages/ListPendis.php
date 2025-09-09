<?php

namespace App\Filament\Resources\PendisResource\Pages;

use App\Filament\Resources\PendisResource;
use App\Models\Pendis;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPendis extends ListRecords
{
    protected static string $resource = PendisResource::class;

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
            'Kemanusiaan' => Tab::make('Cianjur Peduli')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('program', 1))
                ->badge(Pendis::query()->where('program', 1)->count())
                ->badgeColor('success'),
            'Pendidikan' => Tab::make('Cianjur Cerdas')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('program', 2))
                ->badge(Pendis::query()->where('program', 2)->count())
                ->badgeColor('warning'),
            'Kesehatan' => Tab::make('Cianjur Sehat')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('program',  3))
                ->badge(Pendis::query()->where('program', 3)->count())
                ->badgeColor('danger'),
            'Dakwah Advokasi' => Tab::make('Cianjur Taqwa')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('program',  5))
                ->badge(Pendis::query()->where('program', 5)->count())
                ->badgeColor('primary'),
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [
            PendisResource\Widgets\PendisOverview::class,
        ];
    }
}
