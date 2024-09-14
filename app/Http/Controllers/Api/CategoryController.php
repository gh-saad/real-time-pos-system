<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return ApiResponseClass::sendResponse($categories, 'Categories retrieved successfully.', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'category_name' => 'required|string|max:128',
        ]);

        // Create the supplier
        $category = Category::create($validated);

        return ApiResponseClass::sendResponse($category, 'Category created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return ApiResponseClass::sendResponse($category, 'Category retrieved successfully.', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find user by ID or fail
        $category = Category::findOrFail($id);

        // Validate the request data
        $validated = $request->validate([
            'category_name' => 'required|string|max:128',
        ]);

        // Update the user
        $category->update($validated);

        return ApiResponseClass::sendResponse($category, 'Category updated successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find user by ID or fail
        $category = Category::findOrFail($id);

        // Delete the user
        $category->delete();

        return ApiResponseClass::sendResponse(null, 'Category deleted successfully.', 204);
    }
}
