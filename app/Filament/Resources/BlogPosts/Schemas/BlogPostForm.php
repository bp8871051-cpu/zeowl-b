<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Article Content')
                    ->schema([
                        TextInput::make('title')
                            ->label('Article Title')
                            ->required()
                            ->maxLength(200)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, ?string $state, callable $set) {
                                if ($operation === 'create' && $state) {
                                    $set('slug', Str::slug($state));
                                }
                            }),
                        Grid::make(2)->schema([
                            TextInput::make('slug')
                                ->label('URL Slug')
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(200),
                            TextInput::make('category')
                                ->label('Topic / Category')
                                ->placeholder('AI & AUTOMATION / ENGINEERING')
                                ->maxLength(100),
                        ]),
                        Textarea::make('excerpt')
                            ->label('Article Excerpt / Summary')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Author & Publishing Meta')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('author_name')
                                ->label('Author Name')
                                ->default('Zeowl Engineering')
                                ->maxLength(100),
                            TextInput::make('author_role')
                                ->label('Author Role')
                                ->default('Tech Lead')
                                ->maxLength(100),
                            TextInput::make('read_time')
                                ->label('Read Duration')
                                ->placeholder('5 min read')
                                ->maxLength(50),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('date_display')
                                ->label('Published Date Display')
                                ->placeholder('Oct 2026')
                                ->maxLength(50),
                            TextInput::make('views_count')
                                ->label('Views Count')
                                ->numeric()
                                ->default(0),
                        ]),
                        Grid::make(2)->schema([
                            Toggle::make('is_published')
                                ->label('Publish on Public Website')
                                ->default(true),
                            Toggle::make('is_featured')
                                ->label('Highlight as Featured Article')
                                ->default(false),
                        ]),
                        FileUpload::make('cover_image')
                            ->label('Cover Banner Image')
                            ->image()
                            ->directory('blog')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
