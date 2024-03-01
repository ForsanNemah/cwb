<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\SettingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SettingResource\RelationManagers;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';

    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 21;


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
                    ->columnSpan(1),

                Tabs::make('Create New Setting')
                    ->tabs([
                        Tab::make('Web Info ')
                            ->schema([

                                TextInput::make('name')
                                    ->required()
                                    ->label('Website Name'),

                                TextInput::make('phone1')
                                    ->tel()
                                    ->label('Phone One')
                                    ->required(),

                                TextInput::make('phone2')
                                    ->tel()
                                    ->label('Phone Two')
                                    ->required(),

                                TextInput::make('email')
                                    ->email()
                                    ->unique()
                                    ->required()
                                    ->columnSpan(1),

                                TextInput::make('address')
                                    ->required()
                                    ->label('Address')
                                    ->columnSpan(1),

                                MarkdownEditor::make('short_des_footer')
                                    ->required()->label('Short Description'),


                            ])->columns(1),


                        Tab::make('Images')
                            ->schema([

                                FileUpload::make('logo')
                                    ->image()
                                    ->disk('public')
                                    ->directory('SettingImages')
                                    ->label('Website Logo')
                                    ->columnSpan(1),

                                FileUpload::make('icon')
                                    ->image()
                                    ->disk('public')
                                    ->directory('SettingImages')
                                    ->label('Website Icon')
                                    ->columnSpan(1),
                            ]),

                        Tab::make('URL')
                            ->schema([
                                TextInput::make('facebook')
                                    ->required()
                                    ->url(),

                                TextInput::make('instagram')
                                    ->required(),

                                TextInput::make('twitter')
                                    ->required()
                                    ->url(),

                                TextInput::make('pinterest')
                                    ->required()
                                    ->url(),

                                Textarea::make('google_map')
                                    ->required(),
                            ]),

                    ])->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('phone1')
                    ->label('Phone One')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('phone2')
                    ->label('Phone Two')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->searchable(),

                ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular()
                    ->width(70)
                    ->height(70)
                    ->stacked()
                    ->toggleable(isToggledHiddenByDefault: true),


                ImageColumn::make('icon')
                    ->label(' Icon')
                    ->circular()
                    ->width(70)
                    ->height(70)
                    ->stacked()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('address')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('short_des_footer')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('facebook')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),


                TextColumn::make('twitter')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('pinterest')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('instagram')
                    ->searchable()
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
