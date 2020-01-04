<?php

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
                'callsign' => 'G101',
                'assigned_cad' => '1',
                'state' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'vehicle_id' => '2',
                'callsign' => 'G200',
                'assigned_cad' => '2',
                'state' => '5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'vehicle_id' => '3',
                'callsign' => 'GS202',
                'assigned_cad' => '3',
                'state' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            )
        );

        DB::table('units')->insert($data);
    }
}
