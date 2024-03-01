<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Doctor;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\DoctorResource\Pages;
use App\Filament\Resources\DoctorResource\RelationManagers\LanguageDrRelationManager;
use App\Filament\Resources\DoctorResource\RelationManagers\SpecialityRelationManager;
use App\Filament\Resources\DoctorResource\RelationManagers\EducationDrRelationManager;
use App\Filament\Resources\DoctorResource\RelationManagers\DoctorWorkingHourRelationManager;

class DoctorResource extends Resource
{

    protected static ?string $model = Doctor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Doctors';
    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('language_id')
                    ->label('Language')
                    ->relationship('language', 'language_code')
                    ->searchable()
                    ->required()
                    ->preload()
                    ->columnSpanFull(),

                Tabs::make('Create New Doctor')
                    ->tabs([
                        Tab::make('Personal Information ')
                            ->schema(
                                [
                                    TextInput::make('name')
                                        ->required()
                                        ->label('Doctor Name'),

                                    TextInput::make('phone')
                                        ->tel()
                                        ->label('Doctor Phone')
                                        ->required(),

                                    TextInput::make('email')
                                        ->email()
                                        ->unique()
                                        ->label('Doctor Email')
                                        ->required()
                                        ->columnSpan(1),

                                    FileUpload::make('image')
                                        ->image()
                                        ->disk('public')
                                        ->directory('DoctorImages')
                                        ->label('Doctor Image')
                                        ->columnSpan(1),

                                    TextInput::make('address')
                                        ->required()
                                        ->label('Doctor Address'),

                                ]
                            )->columns(1),

                        Tab::make('Branch & Department ')
                            ->schema([

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
                                    ->columnSpanFull(),

                                Select::make('branch_id')
                                    ->relationship(
                                        name: 'branch',
                                        titleAttribute: 'name',
                                        modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant())
                                    )
                                    ->label('Branch')
                                    ->searchable()
                                    ->required()
                                    ->preload()
                                    ->columnSpanFull(),


                            ])->columns(1),

                        Tab::make('Social Media')
                            ->schema([
                                TextInput::make('facebook')
                                    ->required()
                                    ->url(),

                                TextInput::make('twitter')
                                    ->required()
                                    ->url(),

                                TextInput::make('instagram')
                                    ->required()
                                    ->url(),

                                TextInput::make('pinterest')
                                    ->required()
                                    ->url(),


                                TextInput::make('dribbble')
                                    ->required()
                                    ->url(),
                            ])->columns(1),

                        Tab::make('Profile')
                            ->schema([


                                TextInput::make('speciality')
                                    ->required(),

                                TextInput::make('experience')
                                    ->required(),

                                TextInput::make('types_of')
                                    ->required(),
                            ])->columns(1),

                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('language.language_code')
                    ->sortable()
                    ->label('Language'),

                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),


                ImageColumn::make('image')
                    ->label('Doctor Image')
                    ->circular()->searchable()
                    ->width(60)
                    ->height(60)
                    ->stacked(),



                TextColumn::make('branch.name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('department.name')
                    ->sortable()
                    ->searchable(),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}
