<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Get portfolio projects with optional category filter.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Portfolio::query();

        if ($request->filled('category') && $request->input('category') !== 'All Projects') {
            $query->where('category', $request->input('category'));
        }

        if ($request->boolean('featured')) {
            $query->where('is_featured', true);
        }

        $projects = $query->orderBy('order', 'asc')->get();

        return response()->json([
            'success' => true,
            'count' => $projects->count(),
            'data' => $projects,
        ]);
    }

    /**
     * Get single project by slug or ID.
     */
    public function show(string $slugOrId): JsonResponse
    {
        $project = Portfolio::where('slug', $slugOrId)
            ->orWhere('id', $slugOrId)
            ->first();

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => "Project '{$slugOrId}' not found.",
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $project,
        ]);
    }
}
