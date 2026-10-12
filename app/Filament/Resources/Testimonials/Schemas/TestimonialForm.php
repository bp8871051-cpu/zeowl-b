<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Client Testimonial')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('client_name')
                                ->label('Client Name')
                                ->required()
                                ->maxLength(120),
                            TextInput::make('role')
                                ->label('Role / Title')
                                ->placeholder('Founder & CEO')
                                ->maxLength(100),
                            TextInput::make('company')
                                ->label('Company / Business')
                                ->maxLength(120),
                        ]),
                        Textarea::make('quote')
                            ->label('Client Feedback / Quote')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        Grid::make(3)->schema([
                            TextInput::make('rating')
                                ->label('Rating (1-5)')
                                ->numeric()
                                ->default(5),
                            TextInput::make('order')
                                ->label('Display Order')
                                ->numeric()
                                ->default(0),
                            Toggle::make('verified')
                                ->label('Verified Review')
                                ->default(true),
                        ]),
                        Toggle::make('is_featured')
                            ->label('Featured on Homepage')
                            ->default(true),
                        FileUpload::make('avatar')
                            ->label('Client Photo / Avatar')
                            ->image()
                            ->directory('testimonials')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
