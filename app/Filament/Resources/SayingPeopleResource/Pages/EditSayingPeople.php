<?php

namespace App\Filament\Resources\SayingPeopleResource\Pages;

use App\Filament\Resources\SayingPeopleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSayingPeople extends EditRecord
{
    protected static string $resource = SayingPeopleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
