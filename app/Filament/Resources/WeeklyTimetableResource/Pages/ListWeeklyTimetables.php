<?php

namespace App\Filament\Resources\WeeklyTimetableResource\Pages;

use App\Filament\Resources\WeeklyTimetableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWeeklyTimetables extends ListRecords
{
    protected static string $resource = WeeklyTimetableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
