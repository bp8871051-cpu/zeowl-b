<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Configuration Parameter')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('label')
                                ->label('Setting Display Name')
                                ->placeholder('Website Name / Support Email')
                                ->maxLength(120),
                            TextInput::make('key')
                                ->label('Config Key')
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(100),
                            Select::make('group')
                                ->label('Setting Group')
                                ->options([
                                    'general' => 'General Information',
                                    'contact' => 'Contact Details',
                                    'social' => 'Social Media Links',
                                    'seo' => 'SEO Metadata',
                                ])
                                ->default('general')
                                ->required(),
                        ]),
                        Textarea::make('value')
                            ->label('Config Value')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
