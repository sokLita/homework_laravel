<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * 1. READ ALL (List Categories)
     * GET /api/categories
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();
        return response()->json([
            'success' => true,
            'data'    => $categories
        ], Response::HTTP_OK);
    }
    /**
     * 2. CREATE (Add Category)
     * POST /api/categories
     */
    public function store(Request $request): JsonResponse
    {
        // Direct basic validation as requested for cleaner structural evaluation
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'is_active'   => 'sometimes|boolean',
        ]);
        $category = Category::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'Category created successfully.',
            'data'    => $category
        ], Response::HTTP_CREATED);

    }
    /**
     * 3. READ SINGLE (View Details)
     * GET /api/categories/{id}
     */
    public function show(string $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        return response()->json([
            'success' => true,
            'data'    => $category
        ], Response::HTTP_OK);
    }
    /**
     * 4. UPDATE (Edit Parameters)
     * PUT /api/categories/{id}
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'is_active'   => 'sometimes|boolean',
        ]);
        $category->update($validated);
        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully.',
            'data'    => $category
        ], Response::HTTP_OK);
    }
    /**
     * 5. DELETE (Remove Category)
     * DELETE /api/categories/{id}
     */
    public function destroy(string $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully.'
        ], Response::HTTP_OK);
    }
}