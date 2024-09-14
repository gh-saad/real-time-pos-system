<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make($request->all(), [
            'supplier_name' => 'required|max:255',
            'contact_name' => 'required|string|min:3',
            'email' => 'required|email|unique:suppliers',
            'phone' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return ApiResponseClass::sendResponse([], $validator->errors(), 422);
        }
            
        $data = [
            'supplier_name' => $request->supplier_name,
            'contact_name' => $request->contact_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'contact_name' => $request->contact_name,
            "created_by" => getActiveUserId(),
            "workspace_id" => getActiveWorkspaceId(),
        ];
        // Create the user
        $supplier = Supplier::create($data);
    
        // Return success response
        return ApiResponseClass::sendResponse($supplier, 'Supplier created successfully!', 200); 
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
        
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'supplier_name' => 'required|max:255',
            'contact_name' => 'required|string|min:3',
            'email' => 'required|email|unique:suppliers,email,' . $id,
            'phone' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return ApiResponseClass::sendResponse([], $validator->errors(), 422);
        }

        $supplier->supplier_name = $request->supplier_name;
        $supplier->contact_name = $request->contact_name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->save;

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

        return ApiResponseClass::sendResponse(null, 'Supplier deleted successfully.', 204);
    }
}
