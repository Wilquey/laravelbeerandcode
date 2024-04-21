<?php

use App\Models\Plan;
use App\Services\Checkout;
use App\Services\Utils\Http;
use App\Enums\SignatureStatus;
use App\Services\Utils\ThirdParty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignatureController;
use App\Services\PaymentProviders\PaddlePaymentProvider;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/test-controller', [SignatureController::class, 'index']);
});

require __DIR__.'/auth.php';

Route::get('/test-create', function () {
    $plan = Plan::create([
        'name' => 'Last Plan',
        'short_description' => 'A terrible plan',
        'price' => 2990
    ]);

    $client = Auth::user()->client()->create([
        'document' => '00020202001',
        'birthdate' => '1976-03-14'
    ]);

    $client->signatures()->create([
        'plan_id' => $plan->id,
        'status' => SignatureStatus::ACTIVED
    ]);

    return 'hey';
});

Route::get('/test', function () {
    return view('test', ['comida' => 'lasanha']);
});

Route::get('/learn-container', function () {
    $checkout = new Checkout('wilquey@gmail.com', 456);

    return $checkout->handle(new PaddlePaymentProvider(new Http(new ThirdParty)));
});


