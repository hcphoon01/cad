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
                'vrm' => 'MX12 HMN',
                'description' => 'Random description',
                'cad_number' => '1',
                'closed' => 0,
                'display_name' => '20200103 - 0001',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'caller_id' => 'Joseph Bloggs',
                'location' => 'Somewhere',
                'response_level' => 'Standard',
                'vrm' => null,
                'description' => 'Random description again',
                'cad_number' => '2',
                'closed' => 0,
                'display_name' => '20200103 - 0002',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'caller_id' => 'Jeff Bloggs',
                'location' => 'Somewhere Else',
                'response_level' => 'Immediate',
                'vrm' => 'LQ14 TJO',
                'description' => 'Very random description',
                'cad_number' => '3',
                'closed' => 0,
                'display_name' => '20200103 - 0003',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        );

        DB::table('cads')->insert($data);
    }
}
