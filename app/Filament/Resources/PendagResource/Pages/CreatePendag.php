<?php

namespace App\Filament\Resources\PendagResource\Pages;

use App\Filament\Resources\PendagResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePendag extends CreateRecord
{
    protected static string $resource = PendagResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
