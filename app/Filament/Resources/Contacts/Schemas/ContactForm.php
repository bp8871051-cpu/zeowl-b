<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Inquiry Information')
                    ->description('Contact details submitted from the website form')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label('Full Name')
                                ->required()
                                ->maxLength(120),
                            TextInput::make('email')
                                ->label('Email Address')
                                ->email()
                                ->required()
                                ->maxLength(150),
                            TextInput::make('phone')
                                ->label('Phone Number')
                                ->tel()
                                ->maxLength(30),
                            TextInput::make('service')
                                ->label('Requested Service')
                                ->maxLength(100),
                        ]),
                        Textarea::make('message')
                            ->label('Client Message')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Section::make('Lead Status & Follow-Up')
                    ->description('Manage pipeline status and internal team notes')
                    ->schema([
                        Select::make('status')
                            ->label('Inquiry Status')
                            ->options([
                                'new' => 'New Lead',
                                'contacted' => 'Contacted',
                                'in_progress' => 'In Discussion / Progress',
                                'converted' => 'Converted Client',
                                'closed' => 'Closed / Archived',
                            ])
                            ->default('new')
                            ->required(),
                        Textarea::make('notes')
                            ->label('Internal Notes')
                            ->placeholder('Add follow-up notes, client call summaries, or discussion details...')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
