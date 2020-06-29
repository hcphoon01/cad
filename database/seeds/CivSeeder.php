<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CivSeeder extends Seeder
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
        'first_name' => 'Stevie',
        'last_name' => 'Wonder',
        'dob' => '13/05/1950',
        'address' => ' 120  Cunnery Rd, MAINS OF DUDWICK, AB41 2XE',
        'aliases' => null,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'first_name' => 'Gary',
        'last_name' => 'Glitter',
        'dob' => '08/05/1944',
        'address' => '60  Front Street, KNOWL GREEN, CO10 1RD',
        'aliases' => json_encode([
          'Gazza',
          'Paedo'
        ]),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'first_name' => 'David',
        'last_name' => 'Lloyd',
        'dob' => '11/01/1992',
        'address' => '80  Exning Road, HAPSFORD, WA6 5JH',
        'aliases' => null,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
    );
    
    DB::table('people')->insert($data);
  }
}
