<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\LanguageDr;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LanguageDrResource\Pages;
use App\Filament\Resources\LanguageDrResource\RelationManagers;

class LanguageDrResource extends Resource
{
    protected static ?string $model = LanguageDr::class;

    protected static ?string $navigationIcon = 'heroicon-o-language';


    protected static ?string $navigationGroup = 'Doctors';
    protected static ?int $navigationSort = 14;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Fieldset::make('Create New Language Doctor')
                    ->schema([


                        Select::make('doctor_id')
                            ->relationship(
                                name: 'doctor',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant())
                            )
                            ->label('Doctor')
                            ->searchable()
                            ->required()
                            ->preload()
                            ->columnSpanFull(),


                        TextInput::make('language_code')
                            ->required()
                            ->unique()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Select::make('block')
                            ->options([
                                1 => 'Active',
                                0 => 'Block'
                            ])->required()
                            ->preload()
                            ->columnSpanFull(),

                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('doctor.name')->label('Doctor Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('language_code')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->date('d/m/Y')
                    ->sortable()
                    ->label('Created at'),

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
            'index' => Pages\ListLanguageDrs::route('/'),
            'create' => Pages\CreateLanguageDr::route('/create'),
            'edit' => Pages\EditLanguageDr::route('/{record}/edit'),
        ];
    }
}
