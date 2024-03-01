<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Branch;
use Filament\Forms\Form;
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
use App\Filament\Resources\BranchResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BranchResource\RelationManagers;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 4;

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

                Select::make('block')
                    ->options([
                        1 => 'Active',
                        0 => 'Block'
                    ])->required()
                    ->preload()
                    ->columnSpanFull(),

                Fieldset::make('Create New Branch')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->unique()
                            ->columnSpan(1),

                        TextInput::make('email')
                            ->required()
                            ->unique()
                            ->email()

                            ->columnSpan(1),

                        TextInput::make('phone')
                            ->required()
                            ->tel()
                            ->unique()
                            ->columnSpan(1),

                        TextInput::make('location')
                            ->required()
                            ->unique()
                            ->columnSpanFull(),


                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('BranchImages')
                            ->label('Branch Image')
                            ->columnSpanFull(),

                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('phone')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('location')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('image')
                    ->label('Branch Image')
                    ->circular()->searchable()
                    ->width(60)
                    ->height(60)
                    ->stacked(),
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
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranch::route('/create'),
            'edit' => Pages\EditBranch::route('/{record}/edit'),
        ];
    }
}
