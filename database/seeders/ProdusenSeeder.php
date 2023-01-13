<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdusenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Produsen')->insert([
            [
                'nama'         => 'AQUA',
                'lokasi'       => "Jakarta",
                'created_at'   => date("Y-m-d H:i:s")
            ],
            [
                'nama'         => 'Tehbotol',
                'lokasi'       => "Surabaya",
                'created_at'   => date("Y-m-d H:i:s")
            ],
        ]);
    }
}
