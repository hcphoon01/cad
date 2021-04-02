<?php

namespace Database\Seeders;

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
        'make' => 'Ford',
        'model' => 'Focus',
        'vrm' => 'MD68 OBD',
        'class' => 'Marked IRV',
        'division_id' => '1',
        'status' => '1',
        'return' => null,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'make' => 'Volkswagen',
        'model' => 'Golf GTE',
        'vrm' => 'OE15 WKK',
        'class' => 'Marked IRV',
        'division_id' => '1',
        'status' => '1',
        'return' => null,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'make' => 'Volkswagen',
        'model' => 'Crafter',
        'vrm' => 'LJ14 SXE',
        'class' => 'Carrier',
        'division_id' => '1',
        'status' => '1',
        'return' => null,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'make' => 'Audi',
        'model' => 'Q5',
        'vrm' => 'OE15 VWD',
        'class' => 'ARV',
        'division_id' => '4',
        'status' => '0',
        'return' => '2020-07-31',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
    );

    DB::table('vehicles')->insert($data);
  }
}
