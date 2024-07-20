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
        Schema::create('tbal_admin', function(Blueprint $table){
            $table->Increments('admin_id');
            // Add other columns as needed
           // Example column
            $table->string('admin_email',100); // Example column
            $table->string('admin_password');
            $table->string('admin_name');  // Example column
            $table->string('admin_phone'); // Example column
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbal_admin');
    }
};
