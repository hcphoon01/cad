<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call(RolesAndPermissionsSeeder::class);
    $this->call(DivisionsSeeder::class);
    $this->call(QualificationsSeeder::class);
    $this->call(VehicleSeeder::class);
    $this->call(UserSeeder::class);
    $this->call(EventSeeder::class);
    $this->call(CADSeeder::class);
    $this->call(CallsignSeeder::class);
    $this->call(UnitSeeder::class);
    $this->call(UserDataSeeder::class);
    $this->call(QualificationSeeder::class);
    $this->call(ControllerSeeder::class);
    $this->call(MarkersSeeder::class);
    $this->call(CivMarkerSeeder::class);
    $this->call(CivVehicleSeeder::class);
    $this->call(CivSeeder::class);
  }
}
