<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\EducationDr;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EducationDrResource\Pages;
use App\Filament\Resources\EducationDrResource\RelationManagers;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;

class EducationDrResource extends Resource
{
    protected static ?string $model = EducationDr::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Doctors';
    protected static ?int $navigationSort = 12;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Create New Education Doctor')
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

                        MarkdownEditor::make('education')
                            ->required()->columnSpanFull(),

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

                Stack::make([
                    ImageColumn::make('doctor.image')
                        ->circular(), TextColumn::make('doctor.name')
                        ->label('Doctor Name')
                        ->weight(FontWeight::Bold)
                        ->searchable()
                        ->sortable(),

                    TextColumn::make('education')
                        ->searchable()->html(),
                ])



            ])
            ->contentGrid(['md' => 2, 'xl' => 2])
            ->paginationPageOptions([9, 18, 27])
            ->defaultSort('id', 'desc')


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
            'index' => Pages\ListEducationDrs::route('/'),
            'create' => Pages\CreateEducationDr::route('/create'),
            'edit' => Pages\EditEducationDr::route('/{record}/edit'),
        ];
    }
}
