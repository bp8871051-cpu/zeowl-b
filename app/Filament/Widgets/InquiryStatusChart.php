<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\ChartWidget;

class InquiryStatusChart extends ChartWidget
{
    protected static ?int $sort = 3;

    protected ?string $maxHeight = '280px';

    protected ?string $heading = 'Inquiries Status Breakdown';

    protected function getData(): array
    {
        $statuses = [
            'new' => 'New Leads',
            'contacted' => 'Contacted',
            'in_progress' => 'In Progress',
            'converted' => 'Converted',
            'closed' => 'Closed',
        ];

        $data = [];
        $labels = [];
        $backgroundColors = [
            '#3B82F6', // Blue for New
            '#EAB308', // Amber for Contacted
            '#FF7900', // Zeowl Orange for In Progress
            '#10B981', // Emerald for Converted
            '#64748B', // Slate for Closed
        ];

        foreach ($statuses as $statusKey => $label) {
            $labels[] = $label;
            $data[] = Contact::where('status', $statusKey)->count();
        }

        // If no contacts exist yet, show a placeholder segment
        if (array_sum($data) === 0) {
            return [
                'datasets' => [
                    [
                        'data' => [1],
                        'backgroundColor' => ['#334155'],
                    ],
                ],
                'labels' => ['No Inquiries Yet'],
            ];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Inquiries by Status',
                    'data' => $data,
                    'backgroundColor' => $backgroundColors,
                    'borderWidth' => 0,
                    'hoverOffset' => 6,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
