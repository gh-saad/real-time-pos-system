<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return ApiResponseClass::sendResponse($products, 'Products retrieved successfully.', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:128',
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            return ApiResponseClass::sendResponse([], $validator->errors(), 422);
        }

        $data = [
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            "workspace_id" => getActiveWorkspaceId(),
            "created_by" => getActiveUserId(),
        ];
        // Create the supplier
        $product = Product::create($data);

        return ApiResponseClass::sendResponse($product, 'Supplier created successfully.', 201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return ApiResponseClass::sendResponse($product, 'Product retrieved successfully.', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find user by ID or fail
        $product = Product::findOrFail($id);

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:128',
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            return ApiResponseClass::sendResponse([], $validator->errors(), 422);
        }

        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock_quantity = $request->stock_quantity;
        // Update the Product
        $product->save();

        return ApiResponseClass::sendResponse($product, 'Product updated successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find user by ID or fail
        $product = Product::findOrFail($id);

        // Delete the user
        $product->delete();

        return ApiResponseClass::sendResponse(null, 'Product deleted successfully.', 204);
    }
}
