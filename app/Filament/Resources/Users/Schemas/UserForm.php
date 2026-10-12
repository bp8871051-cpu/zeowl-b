<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('User Credentials & Profile')
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
                                ->unique(ignoreRecord: true)
                                ->maxLength(150),
                        ]),
                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->revealable()
                            ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->helperText('Leave empty on edit to keep the existing password.'),
                    ]),

                Section::make('Role & Access Privileges')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('role')
                                ->label('Assigned Role')
                                ->options([
                                    'Super Admin' => 'Super Administrator (Full System Access)',
                                    'Admin' => 'Administrator',
                                    'Content Manager' => 'Content Manager (Services, Portfolio, Blog)',
                                    'Inquiry Manager' => 'Inquiry Manager (Leads & Follow-ups)',
                                ])
                                ->default('Admin')
                                ->required(),
                            Toggle::make('is_active')
                                ->label('Account Active')
                                ->helperText('Deactivating will block access to the admin panel.')
                                ->default(true),
                        ]),
                    ]),
            ]);
    }
}
