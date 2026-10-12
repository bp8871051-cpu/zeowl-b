<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminWebController extends Controller
{
    public function index()
    {
        $stats = [
            'total_contacts' => Contact::count(),
            'new_contacts' => Contact::where('status', 'new')->count(),
            'in_progress_contacts' => Contact::where('status', 'in_progress')->count(),
            'subscribers' => Newsletter::count(),
            'services' => Service::count(),
            'portfolios' => Portfolio::count(),
            'blogs' => BlogPost::count(),
        ];

        $contacts = Contact::orderBy('created_at', 'desc')->take(15)->get();
        $services = Service::orderBy('order', 'asc')->get();
        $portfolios = Portfolio::orderBy('order', 'asc')->take(6)->get();

        return view('admin.dashboard', compact('stats', 'contacts', 'services', 'portfolios'));
    }

    public function updateContactStatus(Request $request, int $id)
    {
        $contact = Contact::findOrFail($id);
        $request->validate([
            'status' => 'required|in:new,in_progress,contacted,closed',
        ]);
        $contact->status = $request->input('status');
        $contact->save();

        return redirect()->back()->with('success', "Inquiry #{$id} status updated to {$contact->status}.");
    }
}
