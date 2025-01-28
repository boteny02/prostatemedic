<?php

namespace App\Filament\Resources\UltrasoundExamsResource\Pages;

use App\Filament\Resources\UltrasoundExamsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUltrasoundExams extends ListRecords
{
    protected static string $resource = UltrasoundExamsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
