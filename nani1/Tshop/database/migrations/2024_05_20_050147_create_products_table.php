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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img')->nullable();
            $table->decimal('price', 10, 2)->default(0); // Giá sản phẩm
            $table->unsignedBigInteger('quantity')->default(0); // Số lượng sản phẩm
            $table->unsignedBigInteger('sold')->default(0); // Số lượng đã bán
            $table->unsignedBigInteger('view')->default(0); // Số lượt xem
            $table->unsignedBigInteger('category_id')->nullable(); // ID của danh mục (khóa ngoại)
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); // Thêm foreign key constraint và đặt null khi xóa danh mục
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
