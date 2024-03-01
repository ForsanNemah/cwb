<?php

namespace App\Filament\Resources\LogoCarouselResource\Pages;

use App\Filament\Resources\LogoCarouselResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLogoCarousel extends EditRecord
{
    protected static string $resource = LogoCarouselResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
