<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChildCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('child_categories')->insert([
            'category_id' => 1,
            'sub_category_id' => 1,
            'name' => 'Kablolu Ürünler',
            'slug' => 'kablolu-urunler',
            'status' => 1,
        ]);
        DB::table('child_categories')->insert([
            'category_id' => 1,
            'sub_category_id' => 1,
            'name' => 'Kablosuz Ürünler',
            'slug' => 'kablosuz-urunler',
            'status' => 1,
        ]);
        DB::table('child_categories')->insert([
            'category_id' => 1,
            'sub_category_id' => 2,
            'name' => 'Konvansiyonel Ürünler',
            'slug' => 'konvansiyonel-urunler',
            'status' => 1,
        ]);
        DB::table('child_categories')->insert([
            'category_id' => 1,
            'sub_category_id' => 2,
            'name' => 'Adresli Ürünler',
            'slug' => 'adresli-urunler',
            'status' => 1,
        ]);
        DB::table('child_categories')->insert([
            'category_id' => 2,
            'sub_category_id' => 3,
            'name' => 'Hp',
            'slug' => 'hp',
            'status' => 1,
        ]);
        DB::table('child_categories')->insert([
            'category_id' => 2,
            'sub_category_id' => 3,
            'name' => 'Lenovo',
            'slug' => 'lenovo',
            'status' => 1,
        ]);
        DB::table('child_categories')->insert([
            'category_id' => 3,
            'sub_category_id' => 5,
            'name' => 'AMD',
            'slug' => 'amd',
            'status' => 1,
        ]);
        DB::table('child_categories')->insert([
            'category_id' => 3,
            'sub_category_id' => 5,
            'name' => 'Intel',
            'slug' => 'intel',
            'status' => 1,
        ]);
        DB::table('child_categories')->insert([
            'category_id' => 3,
            'sub_category_id' => 6,
            'name' => 'AMD',
            'slug' => 'amd',
            'status' => 1,
        ]);
        DB::table('child_categories')->insert([
            'category_id' => 3,
            'sub_category_id' => 6,
            'name' => 'Intel',
            'slug' => 'intel',
            'status' => 1,
        ]);
        DB::table('child_categories')->insert([
            'category_id' => 3,
            'sub_category_id' => 7,
            'name' => 'AMD',
            'slug' => 'amd',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('child_categories')->insert([
            'category_id' => 3,
            'sub_category_id' => 7,
            'name' => 'Nvidia',
            'slug' => 'nvidia',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
