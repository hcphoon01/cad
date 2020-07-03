<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CallsignSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $ur = array(
      array(
        'callsign' => 'CP5',
        'name' => 'Cell Van',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP6',
        'name' => 'Cell Van',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP7',
        'name' => 'IRV',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP8',
        'name' => 'IRV',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP9',
        'name' => 'IRV',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP10',
        'name' => 'IRV',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP11',
        'name' => 'IRV',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP12',
        'name' => 'IRV',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP13',
        'name' => 'IRV',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP14',
        'name' => 'IRV',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP15',
        'name' => 'IRV',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP16',
        'name' => 'IRV',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP412',
        'name' => 'Carrier',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP413',
        'name' => 'Carrier',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CP416',
        'name' => 'Carrier',
        'division_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
    );

    $csg = array(
      array(
        'callsign' => 'CPU1',
        'name' => 'Patrol Supervisor',
        'division_id' => '2',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CPU2',
        'name' => 'Patrol Supervisor',
        'division_id' => '2',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CPU3',
        'name' => 'Support Group',
        'division_id' => '2',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CPU4',
        'name' => 'Support Group',
        'division_id' => '2',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CPU5',
        'name' => 'Support Group',
        'division_id' => '2',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'CPU6',
        'name' => 'Support Group',
        'division_id' => '2',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
    );

    $thog = array(
      array(
        'callsign' => 'OC1',
        'name' => 'Patrol Supervisor',
        'division_id' => '3',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'OC2',
        'name' => 'Patrol Supervisor',
        'division_id' => '3',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'OC21',
        'name' => 'THOG',
        'division_id' => '3',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'OC22',
        'name' => 'THOG',
        'division_id' => '3',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'OC23',
        'name' => 'THOG',
        'division_id' => '3',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'OC24',
        'name' => 'THOG',
        'division_id' => '3',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'OC25',
        'name' => 'THOG',
        'division_id' => '3',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'OC26',
        'name' => 'THOG',
        'division_id' => '3',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'OC27',
        'name' => 'THOG',
        'division_id' => '3',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'OC28',
        'name' => 'THOG',
        'division_id' => '3',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
    );

    $tfg = array(
      array(
        'callsign' => 'Trojan C 1',
        'name' => 'Patrol Supervisor',
        'division_id' => '4',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'Trojan C 3',
        'name' => 'Patrol Supervisor',
        'division_id' => '4',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'Trojan C 33',
        'name' => 'TFG',
        'division_id' => '4',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'Trojan C 34',
        'name' => 'TFG',
        'division_id' => '4',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'Trojan C 35',
        'name' => 'TFG',
        'division_id' => '4',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'Trojan C 36',
        'name' => 'TFG',
        'division_id' => '4',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'Trojan C 37',
        'name' => 'TFG',
        'division_id' => '4',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'Trojan C 38',
        'name' => 'TFG',
        'division_id' => '4',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'Trojan C 39',
        'name' => 'TFG',
        'division_id' => '4',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
    );

    $btp = array(
      array(
        'callsign' => 'B37',
        'name' => 'Patrol Supervisor',
        'division_id' => '5',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'B305',
        'name' => 'Patrol Supervisor',
        'division_id' => '5',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'B323',
        'name' => 'BTP',
        'division_id' => '5',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'B325',
        'name' => 'BTP',
        'division_id' => '5',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'B308',
        'name' => 'BTP',
        'division_id' => '5',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'B332',
        'name' => 'BTP',
        'division_id' => '5',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
    );

    $fire = array(
      array(
        'callsign' => 'A281',
        'name' => 'Patrol Supervisor',
        'division_id' => '6',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
    );

    $ambo = array(
      array(
        'callsign' => 'MEDIC-1',
        'name' => 'LAS',
        'division_id' => '7',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'N150',
        'name' => 'LAS',
        'division_id' => '7',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'N101',
        'name' => 'LAS',
        'division_id' => '7',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'N119',
        'name' => 'LAS',
        'division_id' => '7',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'HELIMED 27',
        'name' => 'LAS',
        'division_id' => '7',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'HELIMED 28',
        'name' => 'LAS',
        'division_id' => '7',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
    );

    $comms = array(
      array(
        'callsign' => 'OSCAR 1',
        'name' => 'Communications Supervisor',
        'division_id' => '8',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'Metro Alpha',
        'name' => 'Communications Supervisor',
        'division_id' => '8',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'Control Dispatcher',
        'name' => 'Communications Operator',
        'division_id' => '8',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'Control Operator',
        'name' => 'Communications Operator',
        'division_id' => '8',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      )
    );

    $extra = array(
      array(
        'callsign' => 'NPAS61',
        'name' => 'Police Helicopter',
        'division_id' => null,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'callsign' => 'M3101',
        'name' => 'Marine Unit',
        'division_id' => null,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
    );

    DB::table('callsigns')->insert($ur);
    DB::table('callsigns')->insert($csg);
    DB::table('callsigns')->insert($thog);
    DB::table('callsigns')->insert($tfg);
    DB::table('callsigns')->insert($btp);
    DB::table('callsigns')->insert($fire);
    DB::table('callsigns')->insert($ambo);
    DB::table('callsigns')->insert($comms);
    DB::table('callsigns')->insert($extra);
  }
}
