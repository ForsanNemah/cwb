<?php

namespace App\Filament\Resources\LanguageDrResource\Pages;

use App\Filament\Resources\LanguageDrResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLanguageDrs extends ListRecords
{
    protected static string $resource = LanguageDrResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
