<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $menu = Kategori::where('nama', 'harga')->first();

        menu::factory()->create([
            'kategori_id' => $makanan->id,
            'makanan' => 'Nasi goreng spesial',
            'harga' => 'Rp.25.000',
        ]);

        menu::factory()->create([
        'kategori_id' => $makanan->id,
        'makanan' => 'soto ayam',
        'harga' => 'Rp.20.000',
        ]);

        menu::factory()->create([
        'kategori_id' => $makanan->id,
        'makanan' => 'ayam bakar',
        'harga' => 'Rp.28.000',
        ]);

        menu::factory()->create([
            'kategori_id' => $makanan->id,
            'minuman' => 'est teh',
            'harga' => 'Rp.5.000',
        ]);

        menu::factory()->create([
            'kategori_id' => $makananl->id,
            'minuman' => 'Jus Alpukat',
            'harga' => 'Rp.15.000',
        ]);
    }
}