<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDataSeeder extends Seeder
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
        'user_id' => '1',
        'shoulder_number' => '3184',
        'division_id' => '6',
        'unit_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'user_id' => '2',
        'shoulder_number' => '1234',
        'division_id' => '1',
        'unit_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'user_id' => '3',
        'shoulder_number' => '2345',
        'division_id' => '1',
        'unit_id' => '2',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'user_id' => '4',
        'shoulder_number' => '5555',
        'division_id' => '2',
        'unit_id' => '3',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'user_id' => '5',
        'shoulder_number' => 'CP12',
        'division_id' => '8',
        'unit_id' => null,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'user_id' => '6',
        'shoulder_number' => 'CP151',
        'division_id' => '5',
        'unit_id' => null,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      )
    );

    DB::table('user_data')->insert($data);
  }
}
