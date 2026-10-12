<?php

namespace App\Filament\Resources\Portfolios\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class PortfoliosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('order', 'asc')
            ->columns([
                TextColumn::make('project_code')
                    ->label('Code')
                    ->badge()
                    ->color('gray')
                    ->sortable(),
                TextColumn::make('title')
                    ->label('Project')
                    ->weight('bold')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('domain')
                    ->label('Domain')
                    ->badge()
                    ->color('info')
                    ->searchable(),
                TextColumn::make('category')
                    ->label('Category')
                    ->searchable(),
                TextColumn::make('impact')
                    ->label('Key Impact')
                    ->color('success')
                    ->weight('semibold'),
                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('order')
                    ->label('Order')
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_featured')
                    ->label('Featured Projects'),
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
