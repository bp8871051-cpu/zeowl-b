<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Contacts\ContactResource;
use App\Models\Contact;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestInquiries extends TableWidget
{
    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Recent Client Inquiries';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Contact::query()->latest())
            ->defaultPaginationPageOption(5)
            ->headerActions([
                Action::make('view_all')
                    ->label('View All Inquiries')
                    ->icon('heroicon-m-arrow-top-right-on-square')
                    ->url(fn (): string => ContactResource::getUrl('index')),
            ])
            ->columns([
                TextColumn::make('name')
                    ->weight('bold')
                    ->searchable(),
                TextColumn::make('email')
                    ->copyable()
                    ->icon('heroicon-m-envelope')
                    ->searchable(),
                TextColumn::make('phone')
                    ->icon('heroicon-m-phone')
                    ->searchable(),
                TextColumn::make('service')
                    ->badge()
                    ->color('info'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'info',
                        'contacted' => 'warning',
                        'in_progress' => 'primary',
                        'converted' => 'success',
                        'closed' => 'gray',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->label('Submitted')
                    ->dateTime('M d, Y H:i')
                    ->sortable(),
            ])
            ->recordActions([
                Action::make('edit')
                    ->url(fn (Contact $record): string => ContactResource::getUrl('edit', ['record' => $record]))
                    ->icon('heroicon-m-pencil-square'),
            ]);
    }
}
