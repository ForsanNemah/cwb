<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Description;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DescriptionResource\Pages;
use App\Filament\Resources\DescriptionResource\RelationManagers;
use Filament\Forms\Components\Group;

class DescriptionResource extends Resource
{
    protected static ?string $model = Description::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Description';

    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 22;


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
                    ->columnSpan(1),

                Select::make('block')
                    ->options([
                        1 => 'Active',
                        0 => 'Block'
                    ])->required()
                    ->columnSpan(1),

                Section::make('Create New Description')
                    ->schema([



                        // Group::make()->schema([

                        MarkdownEditor::make('home')
                            ->required()
                            ->label('Home Description')
                            ->columnSpan(1),

                        MarkdownEditor::make('department')
                            ->required()
                            ->label('Department Description')
                            ->columnSpan(1),



                        // ])->columns(2),

                        // Group::make()->schema([

                        MarkdownEditor::make('appointment')
                            ->required()
                            ->label('Appointment Description')
                            ->columnSpan(1),

                        MarkdownEditor::make('doctor')
                            ->required()
                            ->label('Doctor Description')
                            ->columnSpan(1),

                        // ])->columns(2),

                        // Group::make()->schema([

                        MarkdownEditor::make('gallery')
                            ->required()
                            ->label('Gallery Description')
                            ->columnSpan(1),

                        MarkdownEditor::make('people_say')
                            ->required()
                            ->label('People Say Description')
                            ->columnSpan(1),

                        // ])->columns(2),


                        // Group::make()->schema([

                        MarkdownEditor::make('blog')
                            ->required()
                            ->label('Blog Description')
                            ->columnSpan(1),

                        MarkdownEditor::make('connect')
                            ->required()
                            ->label('Connect Description')
                            ->columnSpan(1),

                        // ])->columns(2),



                    ])->columns(2),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListDescriptions::route('/'),
            'create' => Pages\CreateDescription::route('/create'),
            'edit' => Pages\EditDescription::route('/{record}/edit'),
        ];
    }
}
