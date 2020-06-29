<?php

use Illuminate\Database\Seeder;

class MarkersSeeder extends Seeder
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
            'name' => 'Ailment',
            'id' => 'AL',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Alleges',
            'id' => 'AG',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Conceals items',
            'id' => 'CL',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Contagious',
            'id' => 'CO',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Drugs',
            'id' => 'DR',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Escaper',
            'id' => 'ES',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Explosive',
            'id' => 'XP',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Female Impersonater',
            'id' => 'IF',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Firearms',
            'id' => 'FI',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Male Impersonater',
            'id' => 'IM',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Mental Health',
            'id' => 'MN',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Self Harm',
            'id' => 'SH',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Suicidal',
            'id' => 'SU',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Violent',
            'id' => 'VI',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
          array(
            'name' => 'Weapons',
            'id' => 'WE',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ),
        );
    }
}
