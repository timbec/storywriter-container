<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Filament\Resources\BlogPostResource\RelationManagers;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;




class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form->schema([
        TextInput::make('title')->required()->maxLength(255),
        TextInput::make('slug')->required()->unique(ignoreRecord: true),
        RichEditor::make('body')->required()->columnSpanFull(),
        FileUpload::make('cover_image')
            ->image()
            ->directory('blog')
            ->imageEditor()
            ->maxSize(2048),
        DateTimePicker::make('published_at'),
    ]);
}


    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('title')->sortable()->searchable(),
            TextColumn::make('published_at')->dateTime()->sortable(),
        ]);
    }

    public static function getPages(): array
{
    return [
        'index' => Pages\ListBlogPosts::route('/'),
        'create' => Pages\CreateBlogPost::route('/create'),
        'edit' => Pages\EditBlogPost::route('/{record}/edit'),
    ];
}

    
}