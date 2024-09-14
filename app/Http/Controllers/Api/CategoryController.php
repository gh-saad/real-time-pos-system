<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string|max:128',
        ]);
        if ($validator->fails()) {
            return ApiResponseClass::sendResponse([], $validator->errors(), 422);
        }

        // Create the supplier
        $data = [
            'category_name' => $request->category_name,
            'description' => $request->description,
            "created_by" => getActiveUserId(),
            "workspace_id" => getActiveWorkspaceId(),
        ];
        $category = Category::create($data);

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
        
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string|max:128',
        ]);
        if ($validator->fails()) {
            return ApiResponseClass::sendResponse([], $validator->errors(), 422);
        }

        $category->category_name =  $request->category_name;
        $category->description =  $request->description ?? $category->description;
        // Update the category
        $category->save();

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
