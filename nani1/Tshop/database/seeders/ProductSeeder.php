<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Tạo dữ liệu giả mạo cho bảng products
        foreach (range(1, 25) as $index) {
            DB::table('products')->insert([
                'name' => $faker->unique()->word,
                'img' => $faker->imageUrl(), // Thêm img với giá trị giả mạo
                'description' => $faker->sentence(), // Thêm description với giá trị giả mạo
                'price' => $faker->randomFloat(2, 0, 100), // Giá sản phẩm ngẫu nhiên
                'quantity' => $faker->numberBetween(0, 100), // Số lượng sản phẩm ngẫu nhiên
                'sold' => $faker->numberBetween(0, 50), // Số lượng đã bán ngẫu nhiên
                'view' => $faker->numberBetween(0, 500), // Số lượt xem ngẫu nhiên
                // 'category_id' => $faker->numberBetween(1, 5), // ID của danh mục (khóa ngoại)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
