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
        Schema::table('purchase_order_details', function (Blueprint $table) {
            $table->foreign('fk_porder_id')->references('porder_id')->on('purchase_order');
            $table->foreign('fk_product_id')->references('product_id')->on('products');
            $table->foreign('fk_inventory_id')->references('inventory_id')->on('inventory');
            $table->foreign('fk_supplier_id')->references('supplier_id')->on('supplier');
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('fk_order_id')->references('order_id')->on('order');
            $table->foreign('fk_product_id')->references('product_id')->on('products');
            $table->foreign('fk_odstatus_id')->references('od_status_id')->on('order_details_status');
            $table->foreign('fk_inventory_id')->references('inventory_id')->on('inventory');
        });
        Schema::table('delivery', function (Blueprint $table) {
            $table->foreign('fk_driver_id')->references('driver_id')->on('driver');
            $table->foreign('fk_vehicle_id')->references('vehicle_id')->on('vehicle');
            $table->foreign('fk_order_id')->references('order_id')->on('order');
            $table->foreign('fk_status_id')->references('delivery_status_id')->on('delivery_status');
        });
        Schema::table('inventory', function (Blueprint $table) {
            $table->foreign('fk_inv_type')->references('invtype_id')->on('inventory_transaction_type');
            $table->foreign('fk_product_id')->references('product_id')->on('products');
            $table->foreign('fk_porder_id')->references('porder_id')->on('purchase_order');
            $table->foreign('fk_corder_id')->references('order_id')->on('order');
            $table->foreign('fk_warehouse_id')->references('warehouse_id')->on('warehouse');
            $table->foreign('fk_store_id')->references('store_id')->on('store');
        });
        Schema::table('order', function (Blueprint $table) {
            $table->foreign('fk_customer_id')->references('customer_id')->on('customer');
            $table->foreign('fk_ostatus_id')->references('od_status_id')->on('order_details_status');
        });
        Schema::table('purchase_order', function (Blueprint $table) {
            $table->foreign('fk_postatus_id')->references('po_status_id')->on('purchase_order_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
