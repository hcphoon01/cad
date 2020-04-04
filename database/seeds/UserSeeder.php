<?php

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Harry Cameron',
            'email' => 'harry@test.com',
            'password' => Hash::make('password')
		]);
		
		$user->assignRole('Member');

        factory('App\Models\User\User', 5)->create();
    }
}
