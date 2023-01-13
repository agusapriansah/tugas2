<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('_produk_contoh_')->insert([
            [
                'Nama_Produk'         => 'Produk 1',
                'Jenis_Produk'        => baju ,
                'Produsen_id'         => 1,
                'created_at'          => date("Y-m-d H:i:s")
            ],
            [
                'Nama_Produk'         => 'Produk 2',
                'Jenis_Produk'        => celana ,
                'Produsen_id'         => 2,
                'created_at'          => date("Y-m-d H:i:s")
            ],
            [
                'Nama_Produk'         => 'Produk 3',
                'Jenis_Produk'        => celana ,
                'Produsen_id'         => 2,
                'created_at'          => date("Y-m-d H:i:s")
            ],

        ]);
    }
}