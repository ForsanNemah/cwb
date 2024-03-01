<?php

namespace App\Filament\Resources\EducationDrResource\Pages;

use App\Filament\Resources\EducationDrResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducationDrs extends ListRecords
{
    protected static string $resource = EducationDrResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
