<?php
use App\Http\ApiV1\Modules\comments\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;

Route::post('comments', [CommentsController::class, 'create']);
Route::get('comments', [CommentsController::class, 'getByStepId']);
Route::put('comments/{id}', [CommentsController::class, 'update']);
Route::delete('comments/{id}', [CommentsController::class, 'delete']);
