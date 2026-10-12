<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminServiceController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => Service::orderBy('order', 'asc')->get(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'slug' => 'nullable|string|max:150|unique:services,slug',
            'eyebrow' => 'nullable|string|max:100',
            'short_desc' => 'required|string',
            'full_desc' => 'nullable|string',
            'theme' => 'nullable|string|max:50',
            'accent_color' => 'nullable|string|max:50',
            'card_type' => 'nullable|string|max:50',
            'tags' => 'nullable|array',
            'image' => 'nullable|string|max:255',
            'metrics' => 'nullable|array',
            'deliverables' => 'nullable|array',
            'technologies' => 'nullable|array',
            'process' => 'nullable|array',
            'faqs' => 'nullable|array',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $service = Service::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Service created successfully.',
            'data' => $service,
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:150',
            'slug' => 'sometimes|required|string|max:150|unique:services,slug,' . $id,
            'eyebrow' => 'nullable|string|max:100',
            'short_desc' => 'sometimes|required|string',
            'full_desc' => 'nullable|string',
            'theme' => 'nullable|string|max:50',
            'accent_color' => 'nullable|string|max:50',
            'card_type' => 'nullable|string|max:50',
            'tags' => 'nullable|array',
            'image' => 'nullable|string|max:255',
            'metrics' => 'nullable|array',
            'deliverables' => 'nullable|array',
            'technologies' => 'nullable|array',
            'process' => 'nullable|array',
            'faqs' => 'nullable|array',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $service->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully.',
            'data' => $service,
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully.',
        ]);
    }
}
