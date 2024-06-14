<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class feedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guide_booking')->insert([
            'from' => '4',
            'to' => '2',
            'status' => "10",
            'description' => 'this is test',
            'tour_date' => date("Y-m-d") ,
            'time' => date("H:i") ,
            'days' => "2",
            'number_of_people' => "2",
            'type_of_tour' => "Walking",
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        DB::table('guide_feedback')->insert([
            'from' => '4',
            'to' => '2',
            'for' => '1',
            'rate' => '1',
            'feedback' => 'Test Feedback',
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        DB::table('guide_feedback')->insert([
            'from' => '4',
            'to' => '2',
            'for' => '1',
            'rate' => '4',
            'feedback' => 'Test Feedback',
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        DB::table('guide_feedback')->insert([
            'from' => '4',
            'to' => '2',
            'for' => '1',
            'rate' => '1',
            'feedback' => 'Test Feedback',
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        DB::table('guide_feedback')->insert([
            'from' => '4',
            'to' => '3',
            'for' => '1',
            'rate' => '3',
            'feedback' => 'Test Feedback',
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        DB::table('guide_feedback')->insert([
            'from' => '4',
            'to' => '2',
            'for' => '1',
            'rate' => '4',
            'feedback' => 'Test Feedback',
            'created_at' => date("Y-m-d H:i:s") ,
        ]);
        $this->command->info('Feedbacks created');
    }
}
