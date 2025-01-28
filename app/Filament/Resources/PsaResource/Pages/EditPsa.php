<?php

namespace App\Filament\Resources\PsaResource\Pages;

use App\Filament\Resources\PsaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPsa extends EditRecord
{
    protected static string $resource = PsaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
