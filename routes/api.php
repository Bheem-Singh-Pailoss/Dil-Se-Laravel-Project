<?php
use App\Http\Controllers\API\FetchStateCountries as FetchStateCountriesAlias;
use App\Http\Controllers\API\PaymnetCallbackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route as RouteAlias;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

RouteAlias::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
RouteAlias::POST('/fetch_state', [FetchStateCountriesAlias::class, 'fetch_state_cities'])->name('state');

RouteAlias::POST('/payment/callback', [PaymnetCallbackController::class, 'callback'])->name('callback');

