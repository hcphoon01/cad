<?php

namespace Database\Seeders;

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
        'callsign_id' => '54',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'user_id' => null,
        'callsign_id' => '55',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'user_id' => null,
        'callsign_id' => '56',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'user_id' => null,
        'callsign_id' => '57',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
    );

    DB::table('controllers')->insert($data);
  }
}
