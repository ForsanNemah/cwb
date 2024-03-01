<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Blog;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\BlogResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BlogResource\RelationManagers;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Blog';

    protected static ?string $navigationGroup = 'Blogs';
    protected static ?int $navigationSort = 17;


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


                Select::make('blog_category_id')
                    ->relationship(
                        name: 'blogCategory',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant())
                    )
                    ->label('Blog Category')
                    ->searchable()
                    ->required()
                    ->preload()
                    ->columnSpan(1),

                Fieldset::make('Create New Blog ')
                    ->schema([

                        Select::make('block')
                            ->options([
                                1 => 'Active',
                                0 => 'Block'
                            ])->required()
                            ->columnSpan(1),

                        TextInput::make('keywords')
                            ->required()->columnSpan(1),


                        MarkdownEditor::make('content')
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

                    ImageColumn::make('blogCategory.image')
                        ->circular(),

                    TextColumn::make('blogCategory.name')
                        ->label('Blog Category Name')
                        ->weight(FontWeight::Bold)
                        ->searchable()
                        ->sortable(),

                    TextColumn::make('content')
                        ->searchable()->html(),

                    TextColumn::make('keywords')
                        ->weight(FontWeight::Bold)
                        ->searchable()
                        ->sortable(),

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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
