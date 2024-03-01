<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use App\Models\WeeklyTimetable;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WeeklyTimetableResource\Pages;
use App\Filament\Resources\WeeklyTimetableResource\RelationManagers;

class WeeklyTimetableResource extends Resource
{
    protected static ?string $model = WeeklyTimetable::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';


    protected static ?string $navigationLabel = 'Weekly Timetable';

    protected static ?string $navigationGroup = 'About US';
    protected static ?int $navigationSort = 2;


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

                Fieldset::make('Create New Weekly Timetable')
                    ->schema([
                        TextInput::make('day')
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('for_hour')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TextInput::make('to_hour')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),


                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([


                TextColumn::make('language.language_code')
                    ->sortable()
                    ->searchable(),


                TextColumn::make('day')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('for_hour')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('to_hour')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListWeeklyTimetables::route('/'),
            'create' => Pages\CreateWeeklyTimetable::route('/create'),
            'edit' => Pages\EditWeeklyTimetable::route('/{record}/edit'),
        ];
    }
}
