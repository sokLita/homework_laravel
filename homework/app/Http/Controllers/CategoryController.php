<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller{

    // <!-- 1.Get all categories -->
    public function index(){
        $categories = Category::all();
        return response()->json([
            'message' => 'Categories retrieved successfully',
            'Category' => $categories,
            'Status' => 200
        ]);
    }

    // <!-- 2.Create a new category -->
    public function store(Request $request){
        $category = Category::create($request->all());
        return response()->json([
            'message' => 'Category created successfully',
            'Category' => $category,
            'Status' => 201
        ]);
    }

    // <!-- 3.Update a category -->
    public function update(Request $request, $id){
        $category = Category::find($id);
        if(!$category){
            return response()->json([
                'message' => 'Category not found',
                'Status' => 404
            ]);
        }
        $category->update($request->all());
        return response()->json([
            'message' => 'Category updated successfully',
            'Category' => $category,
            'Status' => 200
        ]);
    }

    // <!-- 4.Delete a category -->
    public function destroy(Request $request, $id){
        $category = Category::find($id);
        if(!$category){
            return response()->json([
                'message' => 'Category not found',
                'Status' => 404
            ]);
        }
        $category->delete();
        return response()->json([
            'message' => 'Category deleted successfully',
            'Status' => 200
        ]);
    }
}