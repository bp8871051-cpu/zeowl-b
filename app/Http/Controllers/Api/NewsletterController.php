<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    /**
     * Subscribe to newsletter.
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:150',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please provide a valid email address.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $newsletter = Newsletter::firstOrCreate(
            ['email' => strtolower(trim($request->input('email')))],
            ['status' => 'active']
        );

        return response()->json([
            'success' => true,
            'message' => 'Thank you for subscribing to Zeowl Infotech updates and engineering insights!',
            'data' => [
                'email' => $newsletter->email,
            ],
        ], 200);
    }
}
