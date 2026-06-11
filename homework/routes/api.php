<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;
// This macro line registers all 5 required API CRUD endpoints safely:
Route::apiResource('categories', CategoryController::class);
