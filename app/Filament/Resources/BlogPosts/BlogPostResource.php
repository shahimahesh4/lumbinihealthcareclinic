<?php

namespace App\Filament\Resources\BlogPosts;

use App\Filament\Resources\BlogPosts\Pages\ManageBlogPosts;
use App\Models\BlogPost;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Article Title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('category')
                    ->label('Category')
                    ->default('Health & Wellness')
                    ->required(),
                TextInput::make('author_name')
                    ->label('Author')
                    ->default('Dr. Specialist'),
                DatePicker::make('published_at')
                    ->label('Published Date'),
                TextInput::make('image_url')
                    ->label('Cover Image URL')
                    ->url(),
                Toggle::make('is_published')
                    ->label('Published')
                    ->default(true),
                Textarea::make('excerpt')
                    ->label('Short Excerpt')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('content')
                    ->label('Full Article Body')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                TextColumn::make('category')
                    ->badge()
                    ->searchable(),
                TextColumn::make('author_name')
                    ->searchable(),
                TextColumn::make('published_at')
                    ->date('M d, Y')
                    ->sortable(),
                IconColumn::make('is_published')
                    ->boolean(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageBlogPosts::route('/'),
        ];
    }
}
