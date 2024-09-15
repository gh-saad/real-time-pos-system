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
        Schema::create('inventory_adjustments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products'); // Links to the product
            $table->integer('quantity_change'); // Positive or negative quantity change
            $table->string('adjustment_type'); // Type of adjustment (e.g., 'sale', 'restock', 'return', 'manual')
            $table->text('description')->nullable(); // Optional note to describe the adjustment
            $table->timestamp('adjustment_date')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_adjustment');
    }
};
