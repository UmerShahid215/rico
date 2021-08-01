<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InstallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /************************ Roles  *****************************/
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $supervisor = Role::firstOrCreate(['name' => 'supervisor']);
        $customer = Role::firstOrCreate(['name' => 'customer']);

        /************************ Permissions  *****************************/
        $addForm = Permission::firstOrCreate(['name' => 'add-form']);
        $showForm = Permission::firstOrCreate(['name' => 'show-form']);

        $addManager = Permission::firstOrCreate(['name' => 'add-manager']);
        $addSupervisor = Permission::firstOrCreate(['name' => 'add-supervisor']);
        $addCustomer = Permission::firstOrCreate(['name' => 'add-customer']);

        $viewSupervisor = Permission::firstOrCreate(['name' => 'view-supervisor']);
        $viewSemiAdmin = Permission::firstOrCreate(['name' => 'view-semiadmin']);
        $viewCustomer = Permission::firstOrCreate(['name' => 'view-customer']);
        $viewAttendance = Permission::firstOrCreate(['name' => 'view-attendance']);

        /************************ Create Admin  *****************************/
        $user = User::firstOrCreate(['id' => 1], [
            'f_name' => 'admin',
            'type' => 1,
            'email' => 'superadmin@demo.com',
            'password' => Hash::make('admin123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $user = User::firstOrCreate(['id' => 2], [
            'f_name' => 'manager',
            'type' => 2,
            'email' => 'semiadmin@demo.com',
            'password' => Hash::make('admin123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $user->assignRole('admin');
        $user->assignRole('manager');
        /************************ Assign Permission to Roles  *****************************/

        $admin->givePermissionTo([$showForm->name, $addManager->name, $addSupervisor->name, $addCustomer->name, $viewCustomer->name, $viewSemiAdmin->name, $viewSupervisor->name, $viewAttendance->name]);
        $manager->givePermissionTo([$addSupervisor->name, $addCustomer->name, $viewSupervisor->name, $viewAttendance->name, $addSupervisor->name]);
        $supervisor->givePermissionTo([$showForm->name, $addCustomer->name, $viewCustomer->name, $viewAttendance->name, $addCustomer->name]);
        $customer->givePermissionTo([$showForm->name, $addForm->name, $viewAttendance->name]);
    }
}
