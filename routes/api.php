
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// PUBLIC ROUTE - LOGIN
Route::post('/login', [AuthController::class, 'login']);

// PROTECTED ROUTES - REQUIRE SANCTUM TOKEN
Route::middleware('auth:sanctum')->group(function () {

    // GET AUTHENTICATED USER
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout']);

    // GUARDIAN DASHBOARD
    Route::get('/guardian/dashboard', function (Request $request) {

        if ($request->user()->role !== 'guardian') {
            return response()->json([
                'message' => 'This action is unauthorized.'
            ], 403);
        }

        return response()->json([
            'message' => 'Welcome to Guardian Dashboard'
        ]);
    });

    // ADMIN DASHBOARD
    Route::get('/admin/dashboard', function (Request $request) {

        if ($request->user()->role !== 'admin') {
            return response()->json([
                'message' => 'This action is unauthorized.'
            ], 403);
        }

        return response()->json([
            'message' => 'Welcome to Admin Dashboard'
        ]);
    });

    // SHARED GUARDIAN ROUTE
    Route::get('/guardian', function (Request $request) {

        return response()->json([
            'message' => 'Guardian route accessed successfully.',
            'user' => $request->user()
        ]);

    });

});
