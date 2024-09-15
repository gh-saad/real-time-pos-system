<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_order_id'); // Foreign key to purchase orders
            $table->unsignedBigInteger('product_id'); // Foreign key to products table
            $table->integer('quantity'); // Quantity of product
            $table->decimal('price', 10, 2); // Unit price of the product
            $table->decimal('discount', 10, 2); // Unit price of the product
            $table->decimal('tax', 10, 2); // Unit price of the product
            $table->decimal('total', 10, 2); // Total price for the item (quantity * price)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_items');
    }
};
