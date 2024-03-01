<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Biography;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\BiographyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BiographyResource\RelationManagers;

class BiographyResource extends Resource
{
    protected static ?string $model = Biography::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Doctors';
    protected static ?int $navigationSort = 13;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Create New Biography Doctor')
                    ->schema([

                        Select::make('doctor_id')
                            ->relationship(
                                name: 'doctor',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant())
                            )
                            ->searchable()
                            ->required()
                            ->preload()
                            ->columnSpanFull(),

                        MarkdownEditor::make('biography')
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

                    TextColumn::make('biography')
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
            'index' => Pages\ListBiographies::route('/'),
            'create' => Pages\CreateBiography::route('/create'),
            'edit' => Pages\EditBiography::route('/{record}/edit'),
        ];
    }
}
