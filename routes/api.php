<?php

use App\Http\Controllers\Api\Admin\AdminBlogController;
use App\Http\Controllers\Api\Admin\AdminContactController;
use App\Http\Controllers\Api\Admin\AdminDashboardController;
use App\Http\Controllers\Api\Admin\AdminPortfolioController;
use App\Http\Controllers\Api\Admin\AdminServiceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\NewsletterController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Zeowl Infotech API Routes
|--------------------------------------------------------------------------
*/

// Health & System Info
Route::get('/health', function () {
    return response()->json([
        'status' => 'operational',
        'service' => 'Zeowl Infotech Backend API',
        'version' => '1.0.0',
        'framework' => 'Laravel ' . app()->version(),
        'php_version' => PHP_VERSION,
        'environment' => config('app.env'),
        'timestamp' => now()->toIso8601String(),
    ]);
});

// Public Endpoints
Route::post('/contact', [ContactController::class, 'store']);
Route::post('/newsletter', [NewsletterController::class, 'store']);

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{slug}', [ServiceController::class, 'show']);

Route::get('/portfolio', [PortfolioController::class, 'index']);
Route::get('/portfolio/{slugOrId}', [PortfolioController::class, 'show']);

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{slug}', [BlogController::class, 'show']);

Route::get('/testimonials', [TestimonialController::class, 'index']);
Route::get('/migrate', function () {
    try {
        if (!\Illuminate\Support\Facades\Schema::hasColumn('testimonials', 'pdf')) {
            \Illuminate\Support\Facades\Schema::table('testimonials', function (\Illuminate\Database\Schema\Blueprint $table) {
                $table->string('pdf')->nullable()->after('avatar');
            });
        }
        if (!\Illuminate\Support\Facades\Schema::hasColumn('testimonials', 'project_name')) {
            \Illuminate\Support\Facades\Schema::table('testimonials', function (\Illuminate\Database\Schema\Blueprint $table) {
                $table->string('project_name')->nullable()->after('avatar');
            });
        }
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return response()->json([
            'success' => true,
            'has_pdf' => \Illuminate\Support\Facades\Schema::hasColumn('testimonials', 'pdf'),
            'has_project_name' => \Illuminate\Support\Facades\Schema::hasColumn('testimonials', 'project_name'),
            'artisan_output' => \Illuminate\Support\Facades\Artisan::output(),
        ]);
    } catch (\Throwable $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage(),
        ], 500);
    }
});
Route::get('/settings', function () {
    return response()->json([
        'success' => true,
        'data' => \App\Models\Setting::pluck('value', 'key'),
    ]);
});

// Authentication
Route::post('/auth/login', [AuthController::class, 'login']);

// Protected Admin Routes (Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/me', [AuthController::class, 'me']);

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);

        // Contacts & Inquiries
        Route::get('/contacts', [AdminContactController::class, 'index']);
        Route::get('/contacts/{id}', [AdminContactController::class, 'show']);
        Route::patch('/contacts/{id}/status', [AdminContactController::class, 'updateStatus']);
        Route::delete('/contacts/{id}', [AdminContactController::class, 'destroy']);

        // CRUD Resources
        Route::apiResource('services', AdminServiceController::class);
        Route::apiResource('portfolio', AdminPortfolioController::class);
        Route::apiResource('blogs', AdminBlogController::class);
    });
});
