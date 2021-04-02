<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CivVehicleSeeder extends Seeder
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
        'vrm' => 'MX68 BHN',
        'make' => 'BMW',
        'model' => 'M3',
        'insurer' => 'Aviva',
        'policy_number' => 'YNM49276038',
        'from' => '29/06/2020',
        'to' => '29/06/2021',
        'other_vehicles' => 'M',
        'civ_id' => 1,
        'permitted_drivers' => null,
        'use' => 'Social and Domestic',
        'named_drivers' => json_encode([
          'Steve Bloggs',
          'Joe Bloggs'
        ]),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'vrm' => 'PN15 LMD',
        'make' => 'Audi',
        'model' => 'RS4',
        'insurer' => 'Direct Line',
        'policy_number' => 'LUY238461093',
        'from' => '29/06/2020',
        'to' => '29/06/2021',
        'other_vehicles' => 'N',
        'civ_id' => 2,
        'permitted_drivers' => null,
        'use' => 'Social, Domestic and Pleasure',
        'named_drivers' => json_encode([
          'Steven Bloggus',
          'Joeseph Bloggus'
        ]),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'vrm' => 'SV10 MNT',
        'make' => 'Ford',
        'model' => 'Focus',
        'insurer' => 'Admiral',
        'policy_number' => 'FDY472917594',
        'from' => '29/06/2020',
        'to' => '29/06/2021',
        'other_vehicles' => 'Y',
        'civ_id' => 3,
        'permitted_drivers' => null,
        'use' => 'Social, Domestic, Pleasure and Commuting',
        'named_drivers' => null,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
    );
    
    DB::table('civ_vehicles')->insert($data);
  }
}
