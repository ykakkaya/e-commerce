<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('categories')->insert([
                'icon' => 'fas fa-eye',
                'name' => 'Güvenlik (CCTV)',
                'slug' => 'guvenlik-cctv',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('categories')->insert([
                'icon' => 'fas fa-chalkboard',
                'name' => 'Kişisel Bilgisayar Aksesuarları',
                'slug' => 'kisisel-bilgisayar-aksesuarlari',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('categories')->insert([
                'icon' => 'fas fa-desktop',
                'name' => 'Bilgisayar Bileşenleri',
                'slug' => 'bilgisayar-bilesenleri',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('categories')->insert([
                'icon' => 'fas fa-coins',
                'name' => 'Sunucu & Ws & Client',
                'slug' => 'sunucu-ws-client',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('categories')->insert([
                'icon' => 'fas fa-cloud-download-alt',
                'name' => 'Veri Depolama',
                'slug' => 'veri-depolama',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

    }
}
