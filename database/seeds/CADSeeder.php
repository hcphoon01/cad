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
                'caller_id' => '1',
                'location' => 'Vinewood',
                'response_level' => 'Immediate',
                'inc_channel' => 'INC 1',
                'description' => 'Random description',
                'display_name' => '20200103 - 0001',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'caller_id' => '1',
                'location' => 'Somewhere',
                'response_level' => 'Standard',
                'inc_channel' => null,
                'description' => 'Random description again',
                'display_name' => '20200103 - 0002',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'caller_id' => '1',
                'location' => 'Somewhere Else',
                'response_level' => 'Immediate',
                'inc_channel' => 'INC 2',
                'description' => 'Very random description',
                'display_name' => '20200103 - 0003',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        );

        DB::table('cads')->insert($data);
    }
}
