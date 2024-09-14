<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return ApiResponseClass::sendResponse($categories, 'Categories retrieved successfully.', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'contact_name' => 'required|string|min:6',
            'phone' => 'required|unique:suppliers',
            'address' => 'required|string|min:8',
        ]);

        // Create the supplier
        $supplier = Supplier::create($validated);

        return ApiResponseClass::sendResponse($supplier, 'Supplier created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return ApiResponseClass::sendResponse($supplier, 'Supplier retrieved successfully.', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find user by ID or fail
        $supplier = Supplier::findOrFail($id);

        // Validate the request data
        $validated = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'contact_name' => 'required|string|min:6',
            'phone' => 'required|unique:suppliers',
            'address' => 'required|string|min:8',
        ]);

        // Update the user
        $supplier->update($validated);

        return ApiResponseClass::sendResponse($supplier, 'Supplier updated successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find user by ID or fail
        $supplier = Supplier::findOrFail($id);

        // Delete the user
        $supplier->delete();

        return ApiResponseClass::sendResponse(null, 'User deleted successfully.', 204);
    }
}
