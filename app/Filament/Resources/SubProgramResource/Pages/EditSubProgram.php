<?php

namespace App\Filament\Resources\SubProgramResource\Pages;

use App\Filament\Resources\SubProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubProgram extends EditRecord
{
    protected static string $resource = SubProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
