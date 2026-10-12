<?php

namespace App\Filament\Resources\Settings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('group', 'asc')
            ->columns([
                TextColumn::make('label')
                    ->label('Setting')
                    ->weight('bold')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('key')
                    ->label('Key')
                    ->color('gray')
                    ->fontFamily('mono')
                    ->searchable(),
                TextColumn::make('group')
                    ->label('Group')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'general' => 'primary',
                        'contact' => 'info',
                        'social' => 'warning',
                        'seo' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('value')
                    ->label('Current Value')
                    ->limit(50)
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('group')
                    ->options([
                        'general' => 'General',
                        'contact' => 'Contact',
                        'social' => 'Social',
                        'seo' => 'SEO',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
