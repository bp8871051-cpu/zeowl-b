<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\JsonResponse;

class AdminDashboardController extends Controller
{
    /**
     * Get aggregated metrics and recent activity for the admin dashboard.
     */
    public function index(): JsonResponse
    {
        $totalContacts = Contact::count();
        $newContacts = Contact::where('status', 'new')->count();
        $inProgressContacts = Contact::where('status', 'in_progress')->count();
        $totalNewsletters = Newsletter::count();
        $totalServices = Service::where('is_active', true)->count();
        $totalPortfolios = Portfolio::count();
        $totalBlogs = BlogPost::where('is_published', true)->count();

        $recentInquiries = Contact::orderBy('created_at', 'desc')->take(5)->get();

        return response()->json([
            'success' => true,
            'stats' => [
                'total_inquiries' => $totalContacts,
                'new_inquiries' => $newContacts,
                'in_progress_inquiries' => $inProgressContacts,
                'newsletter_subscribers' => $totalNewsletters,
                'services_count' => $totalServices,
                'portfolio_count' => $totalPortfolios,
                'blog_count' => $totalBlogs,
            ],
            'recent_inquiries' => $recentInquiries,
        ]);
    }
}
