<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'city' => 'Kathmandu',
            'country' => 'Nepal',
            'email_verified_at' => date("Y-m-d H:i:s") ,
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        $this->command->info('Admin created with login: admin');

        DB::table('users')->insert([
            'name' => 'Test Guide',
            'email' => 'testguide@gmail.com',
            'password' => bcrypt('testguide'),
            'username' => 'testguide',
            'role' => 'guide',
            'city' => 'Kathmandu',
            'country' => 'Nepal',
            'email_verified_at' => date("Y-m-d H:i:s") ,
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        $this->command->info('Guide created with login: testguide');

        DB::table('guide_profile')->insert([
            'user_id' => '2',
            'rate_per_day' => '2000',
            'certificate_image' => 'default.jpg',
            'skill_experience' => ' Lorem epsum Lorem epsum Lorem epsum Lorem epsum Lorem epsum Lorem epsum ',
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        $this->command->info('guide_profile created with login: testguide');

        DB::table('users')->insert([
            'name' => 'Test Guide 2',
            'email' => 'testguide2@gmail.com',
            'password' => bcrypt('testguide2'),
            'username' => 'testguide2',
            'role' => 'guide',
            'city' => 'Bhaktapur',
            'country' => 'Nepal',
            'email_verified_at' => date("Y-m-d H:i:s") ,
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        $this->command->info('Guide created with login: testguide2');

        DB::table('guide_profile')->insert([
            'user_id' => '3',
            'rate_per_day' => '5000',
            'certificate_image' => 'default.jpg',
            'skill_experience' => ' Lorem epsum Lorem epsum Lorem epsum Lorem epsum Lorem epsum Lorem epsum ',
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        $this->command->info('guide_profile created with login: testguide');

        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'testuser@gmail.com',
            'password' => bcrypt('testuser'),
            'username' => 'testuser',
            'role' => 'user',
            'city' => 'Kathmandu',
            'country' => 'Nepal',
            'email_verified_at' => date("Y-m-d H:i:s") ,
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        $this->command->info('User created with login: testuser');
    }
}
