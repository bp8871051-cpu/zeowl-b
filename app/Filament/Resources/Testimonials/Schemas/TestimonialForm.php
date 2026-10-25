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
                Section::make('Client Information')
                    ->description('Client details, designation and business credentials')
                    ->schema([
                        Grid::make([
                            'default' => 1,
                            'sm' => 2,
                            'lg' => 3,
                        ])->schema([
                            TextInput::make('client_name')
                                ->label('Client Name')
                                ->placeholder('e.g. Alexander Hayes')
                                ->required()
                                ->maxLength(120),
                            TextInput::make('client_role')
                                ->label('Role / Title')
                                ->placeholder('e.g. CTO or Founder')
                                ->maxLength(100),
                            TextInput::make('company')
                                ->label('Company / Business')
                                ->placeholder('e.g. FinVibe Technologies')
                                ->maxLength(120),
                        ]),
                        TextInput::make('project_name')
                            ->label('Project / Engagement Name')
                            ->placeholder('e.g. FinVibe SaaS Platform')
                            ->maxLength(150),
                    ]),

                Section::make('Testimonial Content & Display')
                    ->description('Authentic feedback quote, rating and visibility')
                    ->schema([
                        Textarea::make('content')
                            ->label('Client Feedback / Review Quote')
                            ->placeholder('Enter the client testimonial text here...')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                        Grid::make([
                            'default' => 1,
                            'sm' => 3,
                        ])->schema([
                            TextInput::make('rating')
                                ->label('Rating (1-5 Stars)')
                                ->numeric()
                                ->minValue(1)
                                ->maxValue(5)
                                ->default(5)
                                ->required(),
                            TextInput::make('order')
                                ->label('Display Order')
                                ->numeric()
                                ->default(0)
                                ->helperText('Lower numbers appear first'),
                            Toggle::make('is_active')
                                ->label('Active on Website')
                                ->helperText('Toggle on to show on public site')
                                ->default(true),
                        ]),
                        FileUpload::make('avatar')
                            ->label('Client Photo / Avatar')
                            ->image()
                            ->avatar()
                            ->directory('testimonials')
                            ->imageEditor()
                            ->maxSize(2048)
                            ->columnSpanFull(),
                        FileUpload::make('pdf')
                            ->label('Client Testimonial / Case Study PDF (Optional)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('testimonials/docs')
                            ->maxSize(10240)
                            ->helperText('Upload an official client review document or signed case study PDF')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
