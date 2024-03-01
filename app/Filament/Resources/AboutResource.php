<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\About;
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
use App\Filament\Resources\AboutResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AboutResource\RelationManagers;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'About US';

    protected static ?string $navigationGroup = 'About US';
    protected static ?int $navigationSort = 1;


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
                                    ->label('First Title')
                                    ->columnSpanFull(),

                                MarkdownEditor::make('paragraph1')
                                    ->label('First Paragraph')
                                    ->columnSpanFull(),
                            ]),

                        Section::make('Second Paragraph')
                            ->schema([
                                TextInput::make('title2')
                                    ->label('Second Title'),

                                MarkdownEditor::make('paragraph2')
                                    ->label('Second Paragraph'),
                            ]),


                        Section::make('Director Information ')
                            ->schema([
                                TextInput::make('director_name')
                                    ->label('Director Name')
                                    ->columnSpan(1),


                                TextInput::make('director_info')
                                    ->label('Director Information')
                                    ->columnSpan(1),

                                FileUpload::make('director_image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('AboutUsImages')
                                    ->label('Director Image')
                                    ->columnSpanFull(),
                            ]),
                    ]),
                Section::make('Part Two ')
                    ->schema([

                        Group::make()->schema([

                            TextInput::make('hospital_rooms')
                                ->numeric()
                                ->columnSpan(1),


                            TextInput::make('year_of_experience')
                                ->numeric()
                                ->columnSpan(1),

                            TextInput::make('happy_patients')
                                ->numeric()
                                ->columnSpan(1),

                            TextInput::make('qualified_doctor')
                                ->numeric()
                                ->columnSpan(1),

                        ])->columns(2),

                        Group::make()->schema([

                            TextInput::make('video')
                                ->url(),

                            FileUpload::make('video_bg')
                                ->image()
                                ->disk('public')
                                ->directory('AboutUsImages')
                                ->label('Video Background')
                                ->columnSpan(1),
                        ]),
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

                TextColumn::make('director_name')
                    ->sortable()->searchable()
                    ->label('Director Name'),

                TextColumn::make('director_info')
                    ->sortable()
                    ->searchable()
                    ->label('Director Information'),

                ImageColumn::make('director_image')
                    ->label('Director Image')
                    ->circular()->searchable()
                    ->width(60)
                    ->height(60)
                    ->stacked(),


                TextColumn::make('hospital_rooms')
                    ->sortable()
                    ->searchable()
                    ->label('Hospital Rooms ')
                    ->toggleable(isToggledHiddenByDefault: true),


                TextColumn::make('happy_patients')
                    ->sortable()
                    ->searchable()
                    ->label('Happy Patients ')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('year_of_experience')
                    ->sortable()
                    ->searchable()
                    ->label('Year Of Experience')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('qualified_doctor')
                    ->sortable()
                    ->searchable()
                    ->label('Qualified Doctor')
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
                Tables\Actions\ViewAction::make(),

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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
