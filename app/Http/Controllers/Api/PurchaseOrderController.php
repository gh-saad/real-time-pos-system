<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Models\InventoryAdjustment;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchaseOrders = PurchaseOrder::with('items')->get();
        return ApiResponseClass::sendResponse($purchaseOrders, 'Purchase Orders retrieved successfully.', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'order_number' => 'required|string|max:128',
            'supplier_id' => 'required',
            'warehouse_id' => 'required',
            'order_date' => 'required',
            'total_amount'=>'required',
            'status'=>'required',
            'remarks'=>'required',
            'products'=>'required',
        ]);
        if ($validator->fails()) {
            return ApiResponseClass::sendResponse([], $validator->errors(), 422);
        }

        $data = [
            'order_number' => $request->order_number,
            'supplier_id' => $request->supplier_id,
            'warehouse_id' => $request->warehouse_id,
            'order_date' => $request->order_date,
            'total_amount'=>$request->total_amount,
            'status'=>$request->status,
            'remarks'=>$request->remarks,
            "workspace_id" => getActiveWorkspaceId(),
            "created_by" => getActiveUserId(),
        ];
        // Create the supplier
        $purchaseOrder = PurchaseOrder::create($data);
        foreach ($request->products as $product){
            $product = json_decode($product);
            $data = [
                'purchase_order_id' => $purchaseOrder->id,
                'product_id' => $product->product_id, // Access as object
                'quantity' => $product->quantity,
                'price' => $product->price,   
                'discount' => $product->discount,
                'tax' => $product->tax,
                'total' => $product->total,
                'remarks' => $product->remarks,
            ];
            // insert purchase items
            $purchaseOrderItem  = PurchaseOrderItem::create($data);
            $data = [
                'product_id' => $purchaseOrder->id,
                'quantity_change' => $purchaseOrderItem->quantity,
                'adjustment_type' => 'restock',
                'description' => 'Restock after purchase',
                'adjustment_date' => $purchaseOrder->order_date,
            ];
            InventoryAdjustment::create($data);
        }
        return ApiResponseClass::sendResponse($purchaseOrder, 'Purchase order created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
