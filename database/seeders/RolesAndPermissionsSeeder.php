<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
  public function run()
  {
    // Reset cached roles and permissions
    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    // hr
    Role::create(['name' => 'Member']);
    Role::create(['name' => 'Human Resources']);

    // police
    Role::create(['name' => 'Commissioner']);
    Role::create(['name' => 'Assisstant Commissioner']);
    Role::create(['name' => 'Commander']);
    Role::create(['name' => 'Chief Superintendant']);
    Role::create(['name' => 'Detective Chief Superintendant']);
    Role::create(['name' => 'Superintendant']);
    Role::create(['name' => 'Chief Inspector']);
    Role::create(['name' => 'Inspector']);
    Role::create(['name' => 'Sergeant']);
    Role::create(['name' => 'Police Constable']);
    Role::create(['name' => 'Probationary Police Constable']);
    Role::create(['name' => 'Student Constable']);

    // fire & rescue
    Role::create(['name' => 'Group Commander']);
    Role::create(['name' => 'Station Commander']);
    Role::create(['name' => 'Station Officer']);
    Role::create(['name' => 'Sub Officer']);
    Role::create(['name' => 'Leading Firefighter']);
    Role::create(['name' => 'Firefighter']);
    Role::create(['name' => 'Trainee Firefighter']);
    Role::create(['name' => 'Retained Firefighter']);

    // ambulance
    Role::create(['name' => 'Sector Manager']);
    Role::create(['name' => 'Station Manager']);
    Role::create(['name' => 'Team Leader']);
    Role::create(['name' => 'Critical Care Paramedic']);
    Role::create(['name' => 'HART Paramedic']);
    Role::create(['name' => 'Paramedic']);
    Role::create(['name' => 'Student Paramedic']);

    // comms
    Role::create(['name' => 'Communications Supervisor']);
    Role::create(['name' => 'Duty Officer']);
    Role::create(['name' => 'Communications Officer']);

    // civilian
    Role::create(['name' => 'Civilian Duty Officer']);
    Role::create(['name' => 'Civilian Supervisor']);
    Role::create(['name' => 'Authorised Civilian']);

    // create permissions
    Permission::create(['name' => 'manage duty listings']);
    Permission::create(['name' => 'create announcements']);
    Permission::create(['name' => 'manage events']);
    Permission::create(['name' => 'manage applications']);
    Permission::create(['name' => 'update ranks']);
    Permission::create(['name' => 'manage vehicles']);
    Permission::create(['name' => 'add bronze']);
    Permission::create(['name' => 'add silver']);
    Permission::create(['name' => 'add gold']);

    // create roles and assign created permissions

    // this can be done as separate statements
    Role::create(['name' => 'Bronze'])->givePermissionTo([
      'manage vehicles',
      'manage duty listings', 
      'update ranks',
      'add bronze'
      ]);

    Role::create(['name' => 'Silver'])->givePermissionTo([
      'manage vehicles',
      'manage duty listings', 
      'create announcements',
      'manage events', 
      'update ranks', 
      'add silver', 
      'add bronze'
      ]);

    Role::create(['name' => 'Gold'])->givePermissionTo(Permission::all());

    Role::create(['name' => 'Admin'])->givePermissionTo(Permission::all());
  }
}
