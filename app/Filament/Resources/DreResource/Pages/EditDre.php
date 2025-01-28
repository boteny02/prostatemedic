<?php

namespace App\Filament\Resources\DreResource\Pages;

use App\Filament\Resources\DreResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDre extends EditRecord
{
    protected static string $resource = DreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
