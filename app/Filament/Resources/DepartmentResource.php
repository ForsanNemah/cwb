<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Department;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DepartmentResource\Pages;
use App\Filament\Resources\DepartmentResource\RelationManagers;
use App\Filament\Resources\DepartmentResource\RelationManagers\GalleryRelationManager;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Department';

    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 3;

    // protected static ?string $tenantOwnershipRelationshipName = 'team';

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


                Fieldset::make('Create New Department')
                    ->schema([

                        TextInput::make('name')
                            ->required()
                            ->label('Department Name')
                            ->columnSpanFull(),

                        FileUpload::make('icon')
                            ->image()
                            ->disk('public')
                            ->directory('DepartmentImages')
                            ->label('Department Icon')
                            ->columnSpan(1),

                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('DepartmentImages')
                            ->label('Department Image')
                            ->columnSpan(1),

                        Textarea::make('short_des')
                            ->label('Short Description')
                            ->required()
                            ->columnSpanFull(),

                        MarkdownEditor::make('description')
                            ->required()
                            ->columnSpanFull(),

                    ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Stack::make([

                    ImageColumn::make('image')
                        ->circular(),

                    TextColumn::make('name')
                        ->label('Name')
                        ->weight(FontWeight::Bold)
                        ->searchable()
                        ->sortable(),

                    TextColumn::make('short_des')
                        ->weight(FontWeight::Bold)
                        ->searchable()
                        ->sortable(),


                    TextColumn::make('description')
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
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }
}
