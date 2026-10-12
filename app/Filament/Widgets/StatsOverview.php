<?php

namespace App\Filament\Widgets;

use App\Models\BlogPost;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 'full';

    protected function getStats(): array
    {
        $totalInquiries = Contact::count();
        $newInquiries = Contact::where('status', 'new')->count();
        $inProgressInquiries = Contact::where('status', 'in_progress')->count();
        $convertedInquiries = Contact::where('status', 'converted')->count();

        $activeServices = Service::where('is_active', true)->count();
        $totalProjects = Portfolio::count();
        $publishedBlogs = BlogPost::where('is_published', true)->count();

        $conversionRate = $totalInquiries > 0
            ? round(($convertedInquiries / $totalInquiries) * 100, 1)
            : 0;

        return [
            Stat::make('Total Inquiries', (string) $totalInquiries)
                ->description($newInquiries . ' new inquiries awaiting response')
                ->descriptionIcon('heroicon-m-inbox-arrow-down')
                ->color($newInquiries > 0 ? 'warning' : 'gray')
                ->chart([2, 4, 3, 6, 4, 7, max($totalInquiries, 1)]),

            Stat::make('Active Pipeline', (string) ($newInquiries + $inProgressInquiries))
                ->description('In-progress negotiations & consultations')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('primary')
                ->chart([1, 2, 3, 3, 4, 5, max($newInquiries + $inProgressInquiries, 1)]),

            Stat::make('Client Conversions', (string) $convertedInquiries)
                ->description($conversionRate . '% overall win rate')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success')
                ->chart([0, 1, 1, 2, 2, 3, max($convertedInquiries, 1)]),

            Stat::make('Live Content Ecosystem', (string) ($activeServices + $totalProjects))
                ->description($activeServices . ' services • ' . $totalProjects . ' case studies • ' . $publishedBlogs . ' blogs')
                ->descriptionIcon('heroicon-m-squares-2x2')
                ->color('info'),
        ];
    }
}
