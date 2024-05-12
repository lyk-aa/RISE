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
        Schema::create('purchase_order_details', function (Blueprint $table) {
            $table->id('pordersdetails_id');
            $table->foreignId('fk_porder_id');
            $table->foreignId('fk_product_id');
            $table->string('rice_variety',length: 45);
            $table->integer('quantity');
            $table->float('unit_cost');
            $table->float('total_cost');
            $table->date('date_received');
            $table->string('posted_to_inventory',length: 45);
            $table->foreignId('fk_inventory_id');
            $table->foreignId('fk_supplier_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_details');
    }
};
