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
        $npt = array(
            array(
                'callsign' => 'SX01',
                'name' => 'Duty Silver',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SX02',
                'name' => 'Duty Inspector',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SX03',
                'name' => 'Duty Sergeant',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW11',
                'name' => 'Advanced Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW12',
                'name' => 'Advanced Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW13',
                'name' => 'Advanced Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW14',
                'name' => 'Unmarked Advanced Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW15',
                'name' => 'Unmarked Advanced Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW16',
                'name' => 'Unmarked Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW17',
                'name' => 'Unmarked Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW20',
                'name' => 'Incident Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW21',
                'name' => 'Incident Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW22',
                'name' => 'Incident Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW23',
                'name' => 'Incident Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW24',
                'name' => 'Incident Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW25',
                'name' => 'Incident Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW26',
                'name' => 'Incident Response Car',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW30',
                'name' => 'Station Van',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW31',
                'name' => 'Station Van',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW32',
                'name' => 'Operational Support Carrier',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SW33',
                'name' => 'Operational Support Carrier',
                'division_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        );

        $crime = array(
            array(
                'callsign' => 'SQ01',
                'name' => 'Crime Car (Lead)',
                'division_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SQ70',
                'name' => 'Crime Car',
                'division_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SQ71',
                'name' => 'Crime Car',
                'division_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SQ72',
                'name' => 'Crime Car',
                'division_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SQ73',
                'name' => 'Crime Car',
                'division_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SQ74',
                'name' => 'Crime Car',
                'division_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'SQ75',
                'name' => 'Crime Car',
                'division_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        );

        $rct = array(
            array(
                'callsign' => 'TD01',
                'name' => 'Duty Silver Commander',
                'division_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TD02',
                'name' => 'Duty Inspector',
                'division_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TD03',
                'name' => 'Duty Sergeant',
                'division_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TD20',
                'name' => 'Traffic Car',
                'division_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TD21',
                'name' => 'Traffic Car',
                'division_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TD22',
                'name' => 'Traffic Car',
                'division_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TD23',
                'name' => 'Traffic Car',
                'division_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TD24',
                'name' => 'Traffic Car',
                'division_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TD25',
                'name' => 'Traffic Car',
                'division_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TD81',
                'name' => 'Solo Bike',
                'division_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        );

        $trojan = array(
            array(
                'callsign' => 'TRJ01',
                'name' => 'Duty Silver Commander',
                'division_id' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TRJ02',
                'name' => 'Duty Inspector',
                'division_id' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TRJ03',
                'name' => 'Duty Sergeant',
                'division_id' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TRJ400',
                'name' => 'Armed Response Vehicle',
                'division_id' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TRJ401',
                'name' => 'Armed Response Vehicle',
                'division_id' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TRJ402',
                'name' => 'Armed Response Vehicle',
                'division_id' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TRJ403',
                'name' => 'Armed Response Vehicle',
                'division_id' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TRJ404',
                'name' => 'Armed Response Vehicle',
                'division_id' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'TRJ405',
                'name' => 'Armed Response Vehicle',
                'division_id' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        );

        $fire = array(
            array(
                'callsign' => 'U22O1',
                'name' => 'Duty Silver Commander',
                'division_id' => '5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'U22P1',
                'name' => 'Pump Appliance',
                'division_id' => '5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'U22M1',
                'name' => 'Rapid Response Vehicle',
                'division_id' => '5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'U22R1',
                'name' => 'Rescue Appliance',
                'division_id' => '5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        );

        $ambo = array(
            array(
                'callsign' => 'TC01',
                'name' => 'Duty Silver Commander',
                'division_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'C354',
                'name' => 'Single Response Vehicle',
                'division_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'C554',
                'name' => 'Single Response Vehicle',
                'division_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => '927',
                'name' => 'Double Crewed Ambulance',
                'division_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => '221',
                'name' => 'Double Crewed Ambulance',
                'division_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => '825',
                'name' => 'Double Crewed Ambulance',
                'division_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => '551',
                'name' => 'Double Crewed Ambulance',
                'division_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'EC55',
                'name' => 'HEMS RRV',
                'division_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'HELIMED 60',
                'name' => 'HEMS',
                'division_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        );

        $comms = array(
            array(
                'callsign' => 'OSCAR 1',
                'name' => 'Communications Supervisor',
                'division_id' => '7',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'Central 1',
                'name' => 'Communications Operator',
                'division_id' => '7',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'callsign' => 'Central 2',
                'name' => 'Communications Operator',
                'division_id' => '7',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            )
        );

        $extra = array(
            array(
                'callsign' => 'NPAS21',
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

        DB::table('callsigns')->insert($npt);
        DB::table('callsigns')->insert($crime);
        DB::table('callsigns')->insert($rct);
        DB::table('callsigns')->insert($trojan);
        DB::table('callsigns')->insert($fire);
        DB::table('callsigns')->insert($ambo);
        DB::table('callsigns')->insert($comms);
        DB::table('callsigns')->insert($extra);
    }
}
