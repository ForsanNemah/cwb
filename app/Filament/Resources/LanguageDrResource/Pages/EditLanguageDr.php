<?php

namespace App\Filament\Resources\LanguageDrResource\Pages;

use App\Filament\Resources\LanguageDrResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLanguageDr extends EditRecord
{
    protected static string $resource = LanguageDrResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
