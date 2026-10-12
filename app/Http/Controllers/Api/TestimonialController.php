<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;

class TestimonialController extends Controller
{
    /**
     * Get all active client testimonials.
     */
    public function index(): JsonResponse
    {
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'count' => $testimonials->count(),
            'data' => $testimonials,
        ]);
    }
}
