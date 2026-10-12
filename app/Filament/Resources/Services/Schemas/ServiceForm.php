<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('General Service Information')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('number')
                                ->label('Service Number')
                                ->placeholder('01')
                                ->maxLength(10),
                            TextInput::make('title')
                                ->label('Service Title')
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
                            TextInput::make('eyebrow')
                                ->label('Category / Eyebrow')
                                ->placeholder('ENGINEERING & ARCHITECTURE')
                                ->maxLength(100),
                            TextInput::make('card_type')
                                ->label('Card Display Type')
                                ->placeholder('featured / standard')
                                ->maxLength(50),
                        ]),
                        Textarea::make('short_desc')
                            ->label('Short Summary')
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('full_desc')
                            ->label('Comprehensive Description')
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),

                Section::make('Visual & Display Settings')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('accent_color')
                                ->label('Accent Color (Hex)')
                                ->placeholder('#FF7900')
                                ->maxLength(20),
                            TextInput::make('order')
                                ->label('Display Sort Order')
                                ->numeric()
                                ->default(0),
                            Toggle::make('is_active')
                                ->label('Published & Live')
                                ->default(true),
                        ]),
                        FileUpload::make('image')
                            ->label('Service Image / Banner')
                            ->image()
                            ->directory('services')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
