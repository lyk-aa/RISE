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
            $table->id('porderdetails_id');
            $table->foreignId('product_id');
            $table->string('rice_variety');
            $table->integer('quantity');
            $table->float('unit_cost');
            $table->float('total_cost');
            $table->date('date_received');
            $table->date('porder_date');
            $table->foreignId('supplier_id');
            $table->foreignId('po_status_id');
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
