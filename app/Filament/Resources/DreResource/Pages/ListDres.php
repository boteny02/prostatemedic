<?php

namespace App\Filament\Resources\DreResource\Pages;

use App\Filament\Resources\DreResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDres extends ListRecords
{
    protected static string $resource = DreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
