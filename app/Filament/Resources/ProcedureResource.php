<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Procedure;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\ProcedureResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProcedureResource\RelationManagers;

class ProcedureResource extends Resource
{
    protected static ?string $model = Procedure::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 6;

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



                Fieldset::make('Create New Procedure')
                    ->schema([

                        TextInput::make('title')
                            ->required()
                            ->columnSpanFull(),

                        MarkdownEditor::make('description')
                            ->required()
                            ->label('Procedure Description')
                            ->columnSpanFull(),

                        FileUpload::make('before')
                            ->image()
                            ->disk('public')
                            ->directory('ProcedureImages')
                            ->label('Before Procedure')
                            ->columnSpan(1),

                        FileUpload::make('after')
                            ->image()
                            ->disk('public')
                            ->directory('ProcedureImages')
                            ->label('After Procedure')
                            ->columnSpan(1),
                    ])->columns(2),
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

                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('before')
                    ->label('Before Procedure')
                    ->circular()
                    ->width(60)
                    ->height(60)
                    ->stacked(),

                ImageColumn::make('after')
                    ->label('After Procedure')
                    ->circular()
                    ->width(60)
                    ->height(60)
                    ->stacked(),

                TextColumn::make('description')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->date()
                    ->sortable()
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
            'index' => Pages\ListProcedures::route('/'),
            'create' => Pages\CreateProcedure::route('/create'),
            'edit' => Pages\EditProcedure::route('/{record}/edit'),
        ];
    }
}
