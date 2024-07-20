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
        Schema::create('tbl_shipping', function (Blueprint $table) {
            $table->Increments('shipping_id');
            $table->Increments('shipping_name');
            $table->integer('users_id');
            $table->Increments('shipping_address');
            $table->Increments('shipping_phone');
            $table->Increments('shipping_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_shipping');
    }
};
