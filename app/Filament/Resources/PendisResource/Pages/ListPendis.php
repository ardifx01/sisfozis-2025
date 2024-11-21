<?php

namespace App\Filament\Resources\PendisResource\Pages;

use App\Filament\Resources\PendisResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendis extends ListRecords
{
    protected static string $resource = PendisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
