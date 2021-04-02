<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
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
                'vehicle_id' => '1',
                'callsign_id' => '11',
                'assigned_cad' => '1',
                'state' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'vehicle_id' => '2',
                'callsign_id' => '43',
                'assigned_cad' => '2',
                'state' => '5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'vehicle_id' => '3',
                'callsign_id' => '19',
                'assigned_cad' => '3',
                'state' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            )
        );

        DB::table('units')->insert($data);
    }
}
