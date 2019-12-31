<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name' => 'Neighbourhood Policing Team'),
            array('name' => 'Roads Crime Team'),
            array('name' => 'Tactical Firearms Team'),
            array('name' => 'Fire & Rescue'),
            array('name' => 'Ambulance Service'),
            array('name' => 'Force Communications Hub'),
            array('name' => 'Civilian Team'),
        );

        DB::table('divisions')->insert($data);
    }
}
