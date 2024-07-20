<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Tạo dữ liệu giả mạo cho bảng categories
        foreach (range(1, 5) as $index) {
            DB::table('categories')->insert([
                'name' => $faker->unique()->word,
                'description' => $faker->sentence(), // Thêm description với giá trị giả mạo
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
