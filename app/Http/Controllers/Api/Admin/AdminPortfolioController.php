<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPortfolioController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => Portfolio::orderBy('order', 'asc')->get(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'slug' => 'nullable|string|max:200|unique:portfolios,slug',
            'domain' => 'nullable|string|max:100',
            'category' => 'required|string|max:100',
            'category_label' => 'nullable|string|max:100',
            'description' => 'required|string',
            'impact' => 'nullable|string|max:100',
            'users_metric' => 'nullable|string|max:100',
            'tech_stack' => 'nullable|array',
            'image' => 'nullable|string|max:255',
            'live_url' => 'nullable|url|max:255',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $project = Portfolio::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Portfolio project created successfully.',
            'data' => $project,
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $project = Portfolio::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:200',
            'slug' => 'sometimes|required|string|max:200|unique:portfolios,slug,' . $id,
            'domain' => 'nullable|string|max:100',
            'category' => 'sometimes|required|string|max:100',
            'category_label' => 'nullable|string|max:100',
            'description' => 'sometimes|required|string',
            'impact' => 'nullable|string|max:100',
            'users_metric' => 'nullable|string|max:100',
            'tech_stack' => 'nullable|array',
            'image' => 'nullable|string|max:255',
            'live_url' => 'nullable|url|max:255',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $project->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Portfolio project updated successfully.',
            'data' => $project,
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $project = Portfolio::findOrFail($id);
        $project->delete();

        return response()->json([
            'success' => true,
            'message' => 'Portfolio project deleted successfully.',
        ]);
    }
}
