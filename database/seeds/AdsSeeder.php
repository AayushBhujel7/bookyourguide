<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ad')->insert([
            'isBanner' => '1',
            'isTopBanner' => '1',
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        DB::table('ad')->insert([
            'isBanner' => '1',
            'isTopBanner' => '0',
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
    }
}
