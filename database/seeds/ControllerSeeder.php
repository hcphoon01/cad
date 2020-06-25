<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ControllerSeeder extends Seeder
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
                'user_id' => null,
                'callsign_id' => '61',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'user_id' => null,
                'callsign_id' => '62',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'user_id' => null,
                'callsign_id' => '63',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        );

        DB::table('controllers')->insert($data);
    }
}
