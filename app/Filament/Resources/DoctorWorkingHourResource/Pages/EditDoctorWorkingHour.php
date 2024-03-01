<?php

namespace App\Filament\Resources\DoctorWorkingHourResource\Pages;

use App\Filament\Resources\DoctorWorkingHourResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDoctorWorkingHour extends EditRecord
{
    protected static string $resource = DoctorWorkingHourResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
