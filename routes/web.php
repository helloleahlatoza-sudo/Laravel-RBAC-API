<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeniorController;
use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\BenefitController;
use Illuminate\Support\Facades\Route;

// Redirect root URL to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {

    // ================= ADMIN ROUTES =================
    Route::middleware(['role:admin,super_admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            $seniors = \App\Models\Senior::latest()->get();
            $totalSeniors = $seniors->count();
            $pendingRequests = \App\Models\AssistanceRequest::where('status', 'Pending')->count();
            $benefitsDistributed = \App\Models\BenefitRelease::count();

            return view('dashboard', compact('seniors', 'totalSeniors', 'pendingRequests', 'benefitsDistributed'));
        })->name('dashboard');

        // Senior Citizen Routes
        Route::get('/seniors', [SeniorController::class, 'index'])->name('seniors.index');
        Route::post('/seniors', [SeniorController::class, 'store'])->name('seniors.store');
        Route::put('/seniors/{senior}', [SeniorController::class, 'update'])->name('seniors.update');
        Route::delete('/seniors/{senior}', [SeniorController::class, 'destroy'])->name('seniors.destroy');

        // Assistance Request Routes
        Route::get('/assistance-requests', [AssistanceController::class, 'index'])->name('assistance.index');
        Route::post('/assistance-requests', [AssistanceController::class, 'store'])->name('assistance.store');

        // Benefit Release Routes
        Route::get('/benefit-releases', [BenefitController::class, 'index'])->name('benefits.index');
        Route::post('/benefit-releases', [BenefitController::class, 'store'])->name('benefits.store');
    });

    // ================= GUARDIAN ROUTES =================
    Route::middleware(['role:guardian'])->prefix('guardian')->name('guardian.')->group(function () {
        Route::get('/dashboard', function () {
            return view('guardian.dashboard');
        })->name('dashboard');
    });

    // Para mo-403 sab kung i-access sa Admin ang /user/dashboard
    Route::middleware(['role:guardian'])->get('/user/dashboard', function () {
        return view('guardian.dashboard');
    });

    // Profile Routes (Shared)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';