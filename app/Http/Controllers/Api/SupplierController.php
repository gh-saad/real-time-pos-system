<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Models\Supplier;
use Illuminate\Validation\ValidationException;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return ApiResponseClass::sendResponse($suppliers, 'Suppliers retrieved successfully.', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'supplier_name' => 'required|max:255',
                'contact_name' => 'required|string|min:3',
                'email' => 'required|email|unique:suppliers',
                'phone' => 'required',
                'address' => 'required',
            ]);
        
            // Create the user
            $supplier = Supplier::create($validated);
        
            // Return success response
            return ApiResponseClass::sendResponse($supplier, 'Supplier created successfully!', 200);
        
        } catch (ValidationException $e) {
            // Return validation errors in your custom response format
            return ApiResponseClass::sendResponse([], $e->errors(), 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find user by ID or fail
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
        try {
            // Validate the request data
            $validated = $request->validate([
                'supplier_name' => 'sometimes|max:255',
                'contact_name' => 'sometimes|string|min:3',
                'email' => 'sometimes|email|unique:suppliers,' . $id,
                'phone' => 'sometimes',
                'address' => 'sometimes',
            ]);

            // Update the user
            $supplier->update($validated);

            return ApiResponseClass::sendResponse($supplier, 'Supplier updated successfully.', 200);
        } catch (ValidationException $e) {
            // Return validation errors in your custom response format
            return ApiResponseClass::sendResponse([], $e->errors(), 422);
        }
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

        return ApiResponseClass::sendResponse(null, 'Supplier deleted successfully.', 204);
    }
}
