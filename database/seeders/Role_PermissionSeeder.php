<?php

namespace Database\Seeders;

use App\Models\personal_information;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Role_PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=personal_information::create([
            'email' => 'haylu@gmail.com',
            'emp_id' => 'EMP-76ghJK',
            'dep_id_fk' => 13,
            'job_id_fk' => 73,
            'fname' => 'ሃይሉ',
            'mname' => 'ዳኜ',
            'lname' => 'ሸዋንግዛው',
            'age' => '50',
            'sex' => 'male',
            'dob' => '1999-01-02',
            'martial' => 'married',
            'phone' => '+251963332212',
            'employeed_at' => '2021-01-02',
            'worked_for' => '3 years 4 months 3 days',
            'password' => bcrypt('password'),
        ]);
        $admin3 = User::create([
            'emp_id_fk'=>'EMP-76ghJK',
            'name'=>'ሃይሉ',
            'mname'=>'ዳኜ',
            'lname'=>'ሸዋንግዛው',
            'email'=>'haylu@gmail.com',
            'status'=>'approved',
            'password'=>bcrypt('password'),
        ]);
        // $manager = User::create([
        //     'name'=>'Manager',
        //     'email'=>'manager@gmail.com',
        //     'password'=>bcrypt('password')
        // ]); 
        


        $admin_role = Role::create(['name' => 'admin']);
        $user_role = Role::create(['name' => 'user']);
        $hr_role = Role::create(['name' => 'hr officer']);
        $property_admin_role = Role::create(['name' => 'property admin']);
        $store_manager = Role::create(['name' => 'store manager']);
        
        Permission::create(['name' => 'Dashboard access']);
            
        Permission::create(['name' => 'Authorization access']);
        Permission::create(['name' => 'Role access']);
        Permission::create(['name' => 'Role edit']);
        Permission::create(['name' => 'Role create']);
        Permission::create(['name' => 'Role delete']);

        Permission::create(['name' => 'User access']);
        Permission::create(['name' => 'User Grant_Role']);
        Permission::create(['name' => 'User reset_password']);

        Permission::create(['name' => 'Permission access']);
        
        Permission::create(['name' => 'Structure access']);
        Permission::create(['name' => 'Bureau_Structure access']);
        Permission::create(['name' => 'job_title access']);
        
        Permission::create(['name' => 'HR_Management access']);
        Permission::create(['name' => 'Personal_information access']);
        Permission::create(['name' => 'Employee create']);
        Permission::create(['name' => 'Employee edit']);
        Permission::create(['name' => 'Employee detail']);
        Permission::create(['name' => 'Employee delete']);

        Permission::create(['name' => 'Property_Management access']);

        Permission::create(['name' => 'Register_item access']);
        Permission::create(['name' => 'Item view']);
        Permission::create(['name' => 'Item edit']);
        Permission::create(['name' => 'Item delete']);
        Permission::create(['name' => 'Item add']);

        Permission::create(['name' => 'Request_item access']);

        Permission::create(['name' => 'Requested_items access']);
        Permission::create(['name' => 'Requested_items approve']);

        Permission::create(['name' => 'My_items access']);
        Permission::create(['name' => 'Approved_requests access']);
        Permission::create(['name' => 'give item']);

        Permission::create(['name' => 'Post access']);
        Permission::create(['name' => 'Post create']);
        Permission::create(['name' => 'Post view']);
     


        $userPermissions = [
            'Dashboard access',
            'Property_Management access',
            'Request_item access',
            'My_items access'
        ];
        $hr_officerPermissions = [
            'Dashboard access',
            'Structure access',
            'Bureau_Structure access',
            'job_title access',
            'HR_Management access',
            'Personal_information access',
            'Employee create',
            'Employee edit',
            'Employee detail',
            'Employee delete',
            'Property_Management access',
            'Request_item access',
            'My_items access'
        ];
        $property_adminPermissions = [
            'Dashboard access',
            'Property_Management access',
            'Request_item access',
            'My_items access',
            'Approved_requests access',
            'give item',
        ];
        $store_managerPermissions = [
            'Dashboard access',
            'Property_Management access',
            'Request_item access',
            'My_items access',
            'Register_item access',
            'Item view',
            'Item edit',
            'Item delete',
            'Item add',
            'Requested_items access',
            'Requested_items approve'
        ];
        $admin_role->givePermissionTo(Permission::all());
        $user_role->givePermissionTo($userPermissions);
        $hr_role->givePermissionTo($hr_officerPermissions);
        $property_admin_role->givePermissionTo($property_adminPermissions);
        $store_manager->givePermissionTo($store_managerPermissions);
        $admin3->assignRole($admin_role);
        // $manager->assignRole($manager_role);

    }
}
