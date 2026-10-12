<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    /**
     * List all contact inquiries with filters and search.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Contact::query();

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('search')) {
            $term = $request->input('search');
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                  ->orWhere('email', 'like', "%{$term}%")
                  ->orWhere('phone', 'like', "%{$term}%")
                  ->orWhere('service', 'like', "%{$term}%");
            });
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate($request->input('per_page', 15));

        return response()->json([
            'success' => true,
            'data' => $contacts->items(),
            'meta' => [
                'current_page' => $contacts->currentPage(),
                'last_page' => $contacts->lastPage(),
                'per_page' => $contacts->perPage(),
                'total' => $contacts->total(),
            ],
        ]);
    }

    /**
     * Show single inquiry detail.
     */
    public function show(int $id): JsonResponse
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact inquiry not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $contact,
        ]);
    }

    /**
     * Update inquiry status and optional internal notes.
     */
    public function updateStatus(Request $request, int $id): JsonResponse
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact inquiry not found.',
            ], 404);
        }

        $request->validate([
            'status' => 'required|in:new,in_progress,contacted,closed',
            'notes' => 'nullable|string|max:2000',
        ]);

        $contact->status = $request->input('status');
        if ($request->has('notes')) {
            $contact->notes = $request->input('notes');
        }
        $contact->save();

        return response()->json([
            'success' => true,
            'message' => 'Inquiry updated successfully.',
            'data' => $contact,
        ]);
    }

    /**
     * Delete an inquiry.
     */
    public function destroy(int $id): JsonResponse
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact inquiry not found.',
            ], 404);
        }

        $contact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Inquiry deleted successfully.',
        ]);
    }
}
