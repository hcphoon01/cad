<?php

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
        Role::create(['name' => 'Applicant']);
        Role::create(['name' => 'Member']);
        Role::create(['name' => 'Human Resources']);

        // police
        Role::create(['name' => 'Chief Constable']);
        Role::create(['name' => 'Deputy Chief Constable']);
        Role::create(['name' => 'Assisstant Chief Constable']);
        Role::create(['name' => 'Superintendant']);
        Role::create(['name' => 'Chief Inspector']);
        Role::create(['name' => 'Inspector']);
        Role::create(['name' => 'Sergeant']);
        Role::create(['name' => 'Police Constable']);
        Role::create(['name' => 'Special Police Constable']);
        Role::create(['name' => 'Probationary Police Constable']);
        Role::create(['name' => 'Student Constable']);

        // fire & rescue
        Role::create(['name' => 'Watch Manager']);
        Role::create(['name' => 'Crew Manager A']);
        Role::create(['name' => 'Crew Manager B']);
        Role::create(['name' => 'Retained Crew Manager']);
        Role::create(['name' => 'Firefighter']);
        Role::create(['name' => 'Trainee Firefighter']);
        Role::create(['name' => 'Retained Firefighter']);

        // ambulance
        Role::create(['name' => 'Operations Manager']);
        Role::create(['name' => 'Operations Teamleader']);
        Role::create(['name' => 'Critical Care Paramedic']);
        Role::create(['name' => 'HART Paramedic']);
        Role::create(['name' => 'Paramedic']);
        Role::create(['name' => 'Student Paramedic']);
        Role::create(['name' => 'Associate  Practitioner']);
        Role::create(['name' => 'Emergency Care Support Worker']);
        Role::create(['name' => 'Community First Responder']);

        // comms
        Role::create(['name' => 'FCH Superintendant']);
        Role::create(['name' => 'FCH Inspector']);
        Role::create(['name' => 'FCH Duty Officer']);
        Role::create(['name' => 'FCH Dispatcher']);
        Role::create(['name' => 'FCH Operator']);

        // civilian
        Role::create(['name' => 'Civilian Duty Officer']);
        Role::create(['name' => 'Civilian Supervisor']);
        Role::create(['name' => 'Civilian']);

        // create permissions
        Permission::create(['name' => 'assign duty listings']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'Bronze']);
        $role->givePermissionTo('assign duty listings');

        $role = Role::create(['name' => 'Silver']);
        $role->givePermissionTo('assign duty listings');

        $role = Role::create(['name' => 'Gold']);
        $role->givePermissionTo('assign duty listings');
    }
}
