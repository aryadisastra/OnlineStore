<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tembak Data Di Database
        if (DB::table('item')->count() < 1) {
            DB::table('item')->insert([
                [
                    'nama'          =>  'Mouse Logitech G566',
                    'harga'         =>  150000,
                    'stok'          =>  100,
                    'created_at'    =>  now(),
                    'updated_at'    =>  now()
                ],
            ]);

            DB::table('item')->insert([
                [
                    'nama'          =>  'Keyboard Logitech KL566',
                    'harga'         =>  250000,
                    'stok'          =>  1440,
                    'created_at'    =>  now(),
                    'updated_at'    =>  now()
                ],
            ]);

            DB::table('item')->insert([
                [
                    'nama'          =>  'Laptop Asus PV356',
                    'harga'         =>  6599999,
                    'stok'          =>  55,
                    'created_at'    =>  now(),
                    'updated_at'    =>  now()
                ],
            ]);

            DB::table('item')->insert([
                [
                    'nama'          =>  'Monitor LG G739',
                    'harga'         =>  4500500,
                    'stok'          =>  11,
                    'created_at'    =>  now(),
                    'updated_at'    =>  now()
                ],
            ]);

            DB::table('item')->insert([
                [
                    'nama'          =>  'Headset Razer PX34G5',
                    'harga'         =>  230000,
                    'stok'          =>  183,
                    'created_at'    =>  now(),
                    'updated_at'    =>  now()
                ],
            ]);
        }
    }
}
