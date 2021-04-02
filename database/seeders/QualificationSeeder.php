<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QualificationSeeder extends Seeder
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
                'qualification_id' => '1'
            ),
            array(
                'user_id' => '1',
                'qualification_id' => '2'
            ),
            array(
                'user_id' => '2',
                'qualification_id' => '1'
            ),
            array(
                'user_id' => '2',
                'qualification_id' => '4'
            ),
            array(
                'user_id' => '3',
                'qualification_id' => '2'
            ),
            array(
                'user_id' => '3',
                'qualification_id' => '5'
            ),
            array(
                'user_id' => '4',
                'qualification_id' => '1'
            ),
            array(
                'user_id' => '5',
                'qualification_id' => '2'
            ),
            array(
                'user_id' => '6',
                'qualification_id' => '8'
            ),
            
        );

        DB::table('qualification_user')->insert($data);
    }
}
