<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class areaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tourist_area')->insert([
            'title' => 'tourist area',
            'description' => 'This is the description',
            'city' => 'Kathmandu',
            'country' => 'Nepal',
            'slug' => 'tourist_area',
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        DB::table('tourist_area')->insert([
            'title' => 'tourist area 2',
            'description' => 'This is the description',
            'city' => 'Pokhara',
            'country' => 'Nepal',
            'slug' => 'tourist_area_2',
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        DB::table('tourist_area')->insert([
            'title' => 'tourist area 3',
            'description' => 'This is the description',
            'city' => 'Bhaktapur',
            'country' => 'Nepal',
            'slug' => 'tourist_area_3',
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        $this->command->info('tourist_area created');
    }
}
