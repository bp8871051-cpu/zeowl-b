<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class InquiriesChart extends ChartWidget
{
    protected static ?int $sort = 2;

    protected ?string $maxHeight = '280px';

    protected ?string $heading = 'Monthly Inquiries Volume';

    protected function getData(): array
    {
        $months = collect(range(5, 0))->map(function ($monthsAgo) {
            return Carbon::now()->subMonths($monthsAgo);
        });

        $labels = $months->map(fn ($date) => $date->format('M Y'))->toArray();

        $data = $months->map(function ($date) {
            return Contact::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Client Inquiries',
                    'data' => $data,
                    'fill' => 'start',
                    'borderColor' => '#FF7900',
                    'backgroundColor' => 'rgba(255, 121, 0, 0.15)',
                    'tension' => 0.35,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
