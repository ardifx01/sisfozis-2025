<?php

namespace App\Filament\Resources\SubProgramResource\Pages;

use App\Filament\Resources\SubProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubProgram extends CreateRecord
{
    protected static string $resource = SubProgramResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
