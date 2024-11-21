<?php

namespace App\Filament\Resources\PendisResource\Pages;

use App\Filament\Resources\PendisResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePendis extends CreateRecord
{
    protected static string $resource = PendisResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
