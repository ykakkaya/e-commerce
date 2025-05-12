<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'Hırsız Alarm Sistemleri',
            'slug' => 'hirsiz-alarm-sistemleri',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'Yanık Alarm Sistemleri',
            'slug' => 'yanik-alarm-sistemleri',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name' => 'Notebook',
            'slug' => 'notebook',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name' => 'AllInOne',
            'slug' => 'allinone',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name' => 'Anakart',
            'slug' => 'anakart',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name' => 'İşlemci',
            'slug' => 'islemci',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name' => 'Ekran Kartları',
            'slug' => 'ekran-kartlari',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 4,
            'name' => 'Sunucu',
            'slug' => 'sunucu',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 4,
            'name' => 'WorkStation',
            'slug' => 'workstation',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 5,
            'name' => 'Nas',
            'slug' => 'nas',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 5,
            'name' => 'HDD',
            'slug' => 'hdd',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
