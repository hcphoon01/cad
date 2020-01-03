<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
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
                'model' => 'Ford Focus',
                'model_abbreviation' => 'Focus',
                'vrm' => 'MD68 OBD',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'model' => 'BMW X5',
                'model_abbreviation' => 'X5',
                'vrm' => 'OM69 TMD',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'model' => 'Ford Carrier',
                'model_abbreviation' => 'Carrier',
                'vrm' => 'MD68 BNT',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'model' => 'Range Rover',
                'model_abbreviation' => 'GC',
                'vrm' => 'GC1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'model' => 'Audi A3',
                'model_abbreviation' => 'A3',
                'vrm' => 'FH18 RCY',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        );

        DB::table('vehicles')->insert($data);
    }
}
