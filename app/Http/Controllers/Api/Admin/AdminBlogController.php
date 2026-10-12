<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => BlogPost::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:250',
            'slug' => 'nullable|string|max:250|unique:blog_posts,slug',
            'category' => 'required|string|max:100',
            'excerpt' => 'required|string',
            'content' => 'nullable',
            'author_name' => 'nullable|string|max:100',
            'author_role' => 'nullable|string|max:100',
            'read_time' => 'nullable|string|max:50',
            'date_display' => 'nullable|string|max:50',
            'cover_image' => 'nullable|string|max:255',
            'tags' => 'nullable|array',
            'is_featured' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $post = BlogPost::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Blog post created successfully.',
            'data' => $post,
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $post = BlogPost::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:250',
            'slug' => 'sometimes|required|string|max:250|unique:blog_posts,slug,' . $id,
            'category' => 'sometimes|required|string|max:100',
            'excerpt' => 'sometimes|required|string',
            'content' => 'nullable',
            'author_name' => 'nullable|string|max:100',
            'author_role' => 'nullable|string|max:100',
            'read_time' => 'nullable|string|max:50',
            'date_display' => 'nullable|string|max:50',
            'cover_image' => 'nullable|string|max:255',
            'tags' => 'nullable|array',
            'is_featured' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
        ]);

        $post->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Blog post updated successfully.',
            'data' => $post,
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Blog post deleted successfully.',
        ]);
    }
}
