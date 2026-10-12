<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    /**
     * Get all active services.
     */
    public function index(): JsonResponse
    {
        $services = Service::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'count' => $services->count(),
            'data' => $services,
        ]);
    }

    /**
     * Get single service by slug.
     */
    public function show(string $slug): JsonResponse
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => "Service with slug '{$slug}' not found.",
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $service,
        ]);
    }
}
