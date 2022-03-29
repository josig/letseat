<?php

use Illuminate\Database\Seeder;
//use App\Role;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::truncate();

        $role1 = Role::create(['name' => 'Super Administrador']);
        $role2 = Role::create(['name' => 'Administrador']);
        $role3 = Role::create(['name' => 'Empleado']);
        $role4 = Role::create(['name' => 'Responsable']);
        $role5 = Role::create(['name' => 'Alumno']);

        Permission::create(['name' => 'dashboard.superadmin'])->assignRole($role1);
        Permission::create(['name' => 'dashboard.admin'])->assignRole($role2);
        Permission::create(['name' => 'dashboard.employee'])->assignRole($role3);
        Permission::create(['name' => 'dashboard.tutor'])->assignRole($role4);
        Permission::create(['name' => 'dashboard.student'])->assignRole($role5);

        Permission::create(['name' => 'establishments.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'establishments.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'establishments.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'establishments.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'branches.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'branches.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'branches.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'branches.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'users.index'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'users.create'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1,$role2,$role3,$role4]);

        Permission::create(['name' => 'roles.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'roles.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'roles.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'roles.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'transactions.index'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'transactions.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'transactions.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'transactions.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'businessesDocuments.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'businessesDocuments.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'businessesDocuments.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'businessesDocuments.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'orders.index'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'orders.edit'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'orders.create'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'orders.destroy'])->syncRoles([$role1,$role2,$role3,$role4]);

        Permission::create(['name' => 'products.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'products.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'products.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'products.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'accounts.index'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'accounts.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'accounts.create'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'accounts.destroy'])->syncRoles([$role1,$role2,$role3]);

        // 1 forma
        //$role1->permissions()->attach(1,2,3);

        // 2 forma

    }
}
