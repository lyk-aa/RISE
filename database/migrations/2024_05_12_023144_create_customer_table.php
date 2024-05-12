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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('cfirst_name',length: 45);
            $table->string('clast_name',length: 45);
            $table->string('c_pnumber',length: 45);
            $table->string('c_address',length: 45);
            $table->string('c_longitude',length: 45);
            $table->string('c_latitude',length: 45);
            $table->foreignId('id');
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
