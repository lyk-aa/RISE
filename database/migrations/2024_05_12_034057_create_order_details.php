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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('orderdetails_id');
            $table->foreignId('fk_order_id');
            $table->foreignId('fk_product_id');
            $table->integer('quantity');
            $table->float('unit_price');
            $table->foreignId('fk_odstatus_id');
            $table->foreignId('fk_inventory_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
