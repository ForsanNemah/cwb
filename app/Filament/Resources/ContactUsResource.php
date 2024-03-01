<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\ContactUs;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Layout\Grid;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\ContactUsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use App\Filament\Resources\ContactUsResource\RelationManagers;

class ContactUsResource extends Resource
{
    protected static ?string $model = ContactUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationLabel = 'Contact Us';

    protected static ?string $navigationGroup = 'Contact';
    protected static ?int $navigationSort = 18;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Fieldset::make('Create New Contact Us')
                    ->schema([
                        TextInput::make('name')
                            ->required(),

                        TextInput::make('phone')
                            ->tel()
                            ->required(),

                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->columnSpan(1),

                        TextInput::make('subject')
                            ->required(),

                        MarkdownEditor::make('message')
                            ->required(),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Grid::make()->columns(1)->schema([

                    TextColumn::make('name')
                        ->searchable()->weight(FontWeight::SemiBold)
                        ->size(TextColumnSize::Large),

                    TextColumn::make('email')
                        ->searchable()
                        ->icon('heroicon-m-envelope')
                        ->weight(FontWeight::SemiBold),

                    TextColumn::make('phone')
                        ->searchable()
                        ->icon('heroicon-m-phone')
                        ->weight(FontWeight::SemiBold),

                    TextColumn::make('subject')
                        ->searchable()->weight(FontWeight::SemiBold)
                        ->size(TextColumnSize::Large),

                    TextColumn::make('message')
                        ->searchable()->html(),
                ]),
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
            'index' => Pages\ListContactUs::route('/'),
            'create' => Pages\CreateContactUs::route('/create'),
            'edit' => Pages\EditContactUs::route('/{record}/edit'),
        ];
    }
}
