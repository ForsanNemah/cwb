<?php

namespace App\Filament\Resources\LogoCarouselResource\Pages;

use App\Filament\Resources\LogoCarouselResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLogoCarousels extends ListRecords
{
    protected static string $resource = LogoCarouselResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
