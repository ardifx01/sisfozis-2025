<?php

namespace App\Filament\Resources\PendisResource\Pages;

use App\Filament\Resources\PendisResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendis extends EditRecord
{
    protected static string $resource = PendisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
