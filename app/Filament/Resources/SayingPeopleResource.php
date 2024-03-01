<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SayingPeople;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SayingPeopleResource\Pages;
use App\Filament\Resources\SayingPeopleResource\RelationManagers;

class SayingPeopleResource extends Resource
{
    protected static ?string $model = SayingPeople::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 7;

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

                Fieldset::make('Create New Saying People')
                    ->schema([

                        TextInput::make('name')
                            ->required(),

                        TextInput::make('job')
                            ->required(),

                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('SayingPeopleImages')
                            ->label('Image')
                            ->columnSpan(1),

                        MarkdownEditor::make('content')
                            ->required()
                            ->columnSpan(1),

                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //

                Stack::make([
                    ImageColumn::make('image')
                        ->circular(),

                    TextColumn::make('name')
                        ->label('Name')
                        ->weight(FontWeight::Bold)
                        ->searchable()
                        ->sortable(),

                    TextColumn::make('job')
                        ->weight(FontWeight::Bold)
                        ->searchable()
                        ->sortable(),


                    TextColumn::make('content')
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
            'index' => Pages\ListSayingPeople::route('/'),
            'create' => Pages\CreateSayingPeople::route('/create'),
            'edit' => Pages\EditSayingPeople::route('/{record}/edit'),
        ];
    }
}
