<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Get published blog posts with search and category filtering.
     */
    public function index(Request $request): JsonResponse
    {
        $query = BlogPost::where('is_published', true);

        if ($request->filled('category') && $request->input('category') !== 'All Articles') {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('q')) {
            $term = $request->input('q');
            $query->where(function ($q) use ($term) {
                $q->where('title', 'like', "%{$term}%")
                  ->orWhere('excerpt', 'like', "%{$term}%");
            });
        }

        $posts = $query->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate($request->input('per_page', 9));

        return response()->json([
            'success' => true,
            'data' => $posts->items(),
            'meta' => [
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'per_page' => $posts->perPage(),
                'total' => $posts->total(),
            ],
        ]);
    }

    /**
     * Get single blog post by slug.
     */
    public function show(string $slug): JsonResponse
    {
        $post = BlogPost::where('slug', $slug)
            ->where('is_published', true)
            ->first();

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => "Blog post '{$slug}' not found.",
            ], 404);
        }

        $post->increment('views_count');

        return response()->json([
            'success' => true,
            'data' => $post,
        ]);
    }
}
