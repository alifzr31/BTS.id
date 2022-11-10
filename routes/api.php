<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ChecklistController;
use App\Http\Controllers\API\ChecklistItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register', [AuthController::class, 'register']);

Route::get('/checklist', [ChecklistController::class, 'index']);
Route::post('/checklist', [ChecklistController::class, 'store']);
Route::delete('/checklist/{id}', [ChecklistController::class, 'destroy']);


Route::post('/checklistitem', [ChecklistItemController::class, 'store']);