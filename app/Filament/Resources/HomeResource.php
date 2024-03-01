<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Home;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\HomeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HomeResource\RelationManagers;

class HomeResource extends Resource
{
    protected static ?string $model = Home::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Home';

    protected static ?string $navigationGroup = 'Home';
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
                //     ->columnSpanFull(),



                Select::make('language_id')
                    ->label('Language')
                    ->relationship('language', 'language_code')
                    ->searchable()
                    ->required()
                    ->preload()
                    ->columnSpanFull(),

                Section::make('Part Two ')
                    ->schema([

                        Section::make('First Paragraph')
                            ->schema([
                                TextInput::make('title1')
                                    ->required()
                                    ->label('First Title')
                                    ->columnSpanFull(1),

                                MarkdownEditor::make('paragraph1')
                                    ->required()
                                    ->label('First Paragraph')
                                    ->columnSpan(1),

                                FileUpload::make('image1')
                                    ->image()
                                    ->disk('public')
                                    ->directory('HomeImages')
                                    ->label('First Image ')
                                    ->columnSpan(1),
                            ])->columns(2),


                        Section::make('Second Paragraph')
                            ->schema([

                                TextInput::make('title2')
                                    ->required()
                                    ->label('Second Title')
                                    ->columnSpanFull(),

                                MarkdownEditor::make('paragraph2')
                                    ->required()
                                    ->label('Second Paragraph')
                                    ->columnSpan(1),

                                FileUpload::make('image2')
                                    ->image()
                                    ->disk('public')
                                    ->directory('HomeImages')
                                    ->label('Second Image ')
                                    ->columnSpan(1),
                            ])->columns(2),


                        Section::make('The Third Paragraph')
                            ->schema([

                                TextInput::make('title3')
                                    ->required()
                                    ->label('The Third Title')
                                    ->columnSpanFull(),

                                MarkdownEditor::make('paragraph3')
                                    ->required()
                                    ->label('The Third Paragraph')
                                    ->columnSpan(1),

                                FileUpload::make('image3')
                                    ->image()
                                    ->disk('public')
                                    ->directory('HomeImages')
                                    ->label('The Third Image ')
                                    ->columnSpan(1),
                            ])->columns(2),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('language.language_code')
                    ->sortable()
                    ->searchable()
                    ->label('Language'),


                TextColumn::make('title1')
                    ->sortable()
                    ->searchable()
                    ->label('First Title'),

                TextColumn::make('paragraph1')
                    ->sortable()
                    ->searchable()
                    ->label('First Paragraph')
                    ->toggleable(isToggledHiddenByDefault: true),

                ImageColumn::make('image1')
                    ->label('First Image ')
                    ->circular()
                    ->searchable()
                    ->width(60)
                    ->height(60)
                    ->stacked()
                    ->toggleable(isToggledHiddenByDefault: true),





                TextColumn::make('title2')
                    ->sortable()
                    ->searchable()
                    ->label('Second Title'),

                TextColumn::make('paragraph2')
                    ->sortable()
                    ->searchable()
                    ->label('Second Paragraph')
                    ->toggleable(isToggledHiddenByDefault: true),

                ImageColumn::make('image2')
                    ->label('Second Image ')
                    ->circular()
                    ->searchable()
                    ->width(60)
                    ->height(60)
                    ->stacked()
                    ->toggleable(isToggledHiddenByDefault: true),



                TextColumn::make('title3')
                    ->sortable()
                    ->searchable()
                    ->label('The Third Title'),

                TextColumn::make('paragraph3')
                    ->sortable()
                    ->searchable()
                    ->label('The Third Paragraph')
                    ->toggleable(isToggledHiddenByDefault: true),

                ImageColumn::make('image3')
                    ->label('The Third Image ')
                    ->circular()
                    ->searchable()
                    ->width(60)
                    ->height(60)
                    ->stacked()
                    ->toggleable(isToggledHiddenByDefault: true),





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
            'index' => Pages\ListHomes::route('/'),
            'create' => Pages\CreateHome::route('/create'),
            'edit' => Pages\EditHome::route('/{record}/edit'),
        ];
    }
}
