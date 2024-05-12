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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id('inventory_id');
            $table->foreignId('fk_inv_type');
            $table->foreignId('fk_product_id');
            $table->integer('quantity');
            $table->foreignId('fk_porder_id');
            $table->foreignId('fk_corder_id');
            $table->foreignId('fk_warehouse_id');
            $table->foreignId('fk_store_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
