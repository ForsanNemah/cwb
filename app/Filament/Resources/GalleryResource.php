<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Gallery;
use Filament\Forms\Get;
use App\Models\Language;
use Filament\Forms\Form;
use App\Models\Department;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GalleryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GalleryResource\RelationManagers;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Gallery';

    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 5;

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






                Select::make('department_id')
                    ->relationship(
                        name: 'department',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant())
                    )
                    ->label('Department')
                    ->searchable()
                    ->required()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $product = Department::find($state);
                        if ($product) {
                            $set('language_id', $product->language_id);
                        }
                    })->columnSpanFull(),






                Fieldset::make('Create New Gallery')
                    ->schema([

                        // Select::make('department_id')
                        //     ->relationship(
                        //         name: 'department',
                        //         titleAttribute: 'name',
                        //         modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant())
                        //     )
                        //     ->label('Department')
                        //     ->searchable()
                        //     ->required()
                        //     ->preload()
                        //     ->columnSpan(1),


                        Select::make('language_id')
                            ->label('Language')
                            ->options(
                                fn (Get $get): Collection => Language::query()
                                    ->where('id', $get('language_id'))
                                    ->pluck(
                                        'language_code',
                                        'id'
                                    )
                            )
                            ->searchable()
                            ->preload(),

                        Select::make('block')
                            ->options([
                                1 => 'Active',
                                0 => 'Block'
                            ])->required()
                            ->preload()
                            ->columnSpan(1),

                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('GalleryImages')
                            ->label('Gallery Image')
                            ->columnSpanFull(),



                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('department.name')
                    ->searchable(),




                ImageColumn::make('image')
                    ->label('Images')
                    ->circular()
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
