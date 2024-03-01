<?php

namespace App\Filament\Resources\SayingPeopleResource\Pages;

use App\Filament\Resources\SayingPeopleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSayingPeople extends ListRecords
{
    protected static string $resource = SayingPeopleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
