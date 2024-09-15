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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique(); // Order number
            $table->unsignedBigInteger('supplier_id'); // Supplier foreign key
            $table->unsignedBigInteger('warehouse_id'); // Supplier foreign key
            $table->date('order_date'); // Date of order
            $table->decimal('total_amount', 10, 2); // Total amount
            $table->tinyInteger('status')->default(0); // Order status
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('workspace_id');
            $table->unsignedBigInteger('created_by'); // Optional remarks
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
