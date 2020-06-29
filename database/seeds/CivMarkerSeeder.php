<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CivMarkerSeeder extends Seeder
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
        'marker_id' => 1,
        'person_id' => 1
      ),
      array(
        'marker_id' => 8,
        'person_id' => 2
      ),
      array(
        'marker_id' => 6,
        'person_id' => 3
      ),
      array(
        'marker_id' => 7,
        'person_id' => 3
      ),
      array(
        'marker_id' => 9,
        'person_id' => 3
      ),
      array(
        'marker_id' => 15,
        'person_id' => 3
      ),
    );
    DB::table('marker_person')->insert($data);
  }
}
