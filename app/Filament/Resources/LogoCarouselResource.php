<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\LogoCarousel;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LogoCarouselResource\Pages;
use App\Filament\Resources\LogoCarouselResource\RelationManagers;

class LogoCarouselResource extends Resource
{
    protected static ?string $model = LogoCarousel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Logo Carousel';

    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 9;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                // Select::make('language_id')
                //     ->relationship(
                //         name: 'language',
                //         titleAttribute: 'language_code',
                //         modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant())
                //     )
                //     ->label('Language')
                //     ->searchable()
                //     ->required()
                //     ->preload()
                //     ->columnSpan(1),


                Select::make('language_id')
                    ->label('Language')
                    ->relationship('language', 'language_code')
                    ->searchable()
                    ->required()
                    ->preload()
                    ->columnSpan(1),

                Select::make('block')
                    ->options([
                        1 => 'Active',
                        0 => 'Block'
                    ])->required()
                    ->preload()
                    ->columnSpan(1),

                Fieldset::make('Create New Logo Carousel')
                    ->schema([
                        FileUpload::make('logo')
                            ->image()
                            ->disk('public')
                            ->directory('LogoCarouselImages')
                            ->label('Logo Carousel')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('language.language_code')
                    ->sortable()->searchable()
                    ->label('Language '),

                ImageColumn::make('logo')
                    ->label('Logo Carousel')
                    ->circular()->searchable()
                    ->width(100)
                    ->height(100)
                    ->stacked(),

                TextColumn::make('created_at')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLogoCarousels::route('/'),
            'create' => Pages\CreateLogoCarousel::route('/create'),
            'edit' => Pages\EditLogoCarousel::route('/{record}/edit'),
        ];
    }
}
