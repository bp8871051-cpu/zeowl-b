<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Project Overview')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('project_code')
                                ->label('Project Code')
                                ->placeholder('ZE-01')
                                ->maxLength(30),
                            TextInput::make('title')
                                ->label('Project Title')
                                ->required()
                                ->maxLength(150)
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (string $operation, ?string $state, callable $set) {
                                    if ($operation === 'create' && $state) {
                                        $set('slug', Str::slug($state));
                                    }
                                }),
                            TextInput::make('slug')
                                ->label('URL Slug')
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(150),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('domain')
                                ->label('Domain / Industry')
                                ->placeholder('FinTech / Healthcare')
                                ->maxLength(100),
                            TextInput::make('category')
                                ->label('Category')
                                ->placeholder('Web App / Mobile App / AI')
                                ->maxLength(100),
                        ]),
                        Textarea::make('description')
                            ->label('Project Description')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Section::make('Metrics & Media')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('impact')
                                ->label('Client Impact Result')
                                ->placeholder('+320% User Growth')
                                ->maxLength(150),
                            TextInput::make('users_metric')
                                ->label('Users Metric')
                                ->placeholder('50K+ Monthly Active Users')
                                ->maxLength(100),
                        ]),
                        Grid::make(3)->schema([
                            TextInput::make('live_url')
                                ->label('Live Project URL')
                                ->url()
                                ->maxLength(255),
                            TextInput::make('order')
                                ->label('Sort Order')
                                ->numeric()
                                ->default(0),
                            Toggle::make('is_featured')
                                ->label('Featured Showcase')
                                ->default(false),
                        ]),
                        FileUpload::make('image')
                            ->label('Project Screenshot / Mockup')
                            ->image()
                            ->directory('portfolio')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
