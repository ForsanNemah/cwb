<?php

namespace App\Filament\Resources\WeeklyTimetableResource\Pages;

use App\Filament\Resources\WeeklyTimetableResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWeeklyTimetable extends EditRecord
{
    protected static string $resource = WeeklyTimetableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
