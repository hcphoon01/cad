<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                'name' => 'Daily Patrol',
                'description' => 'The normal patrol',
                'start_time' => Carbon::parse('04/04/2020 19:00'),
                'end_time' => Carbon::parse('04/04/2020 22:00'),
                'max_participants' => '30',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'name' => 'Special patrol',
                'description' => 'A Special patrol',
                'start_time' => Carbon::parse('04/05/2020 19:00'),
                'end_time' => Carbon::parse('04/05/2020 22:00'),
                'max_participants' => '30',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        );

        DB::table('events')->insert($data);
    }
}
