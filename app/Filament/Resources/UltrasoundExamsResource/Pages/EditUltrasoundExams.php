<?php

namespace App\Filament\Resources\UltrasoundExamsResource\Pages;

use App\Filament\Resources\UltrasoundExamsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUltrasoundExams extends EditRecord
{
    protected static string $resource = UltrasoundExamsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
