<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CADSeeder extends Seeder
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
                'caller_name' => 'Joe Bloggs',
                'location' => 'Vinewood',
                'response_level' => 'Immediate',
                'telephone' => '0-1-2-1-Do-One',
                'vrm' => 'MX12 HMN',
                'description' => 'Random description',
                'toa' => date('Hi'),
                'cad_number' => '1',
                'closed' => 0,
                'display_name' => '00001/28JUN20',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'caller_id' => 'Joseph Bloggs',
                'location' => 'Somewhere',
                'response_level' => 'Standard',
                'telephone' => null,
                'vrm' => null,
                'description' => 'Random description again',
                'toa' => date('Hi'),
                'cad_number' => '2',
                'closed' => 0,
                'display_name' => '00002/28JUN20',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'caller_id' => 'Jeff Bloggs',
                'location' => 'Somewhere Else',
                'response_level' => 'Immediate',
                'telephone' => '0-1-2-1-Do-Three',
                'vrm' => 'LQ14 TJO',
                'description' => 'Very random description',
                'toa' => date('Hi'),
                'cad_number' => '3',
                'closed' => 0,
                'display_name' => '00003/28JUN20',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        );

        DB::table('cads')->insert($data);
    }
}
