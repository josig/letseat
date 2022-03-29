<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();
        $superAdminRole = Role::where('name', 'Super Administrador')->first();
        $adminRole = Role::where('name', 'Administrador')->first();
        $tutorRole = Role::where('name', 'Responsable')->first();
        //$studentRole = Role::where('name', 'Alumno')->first();

        $superAdmin = User::create([
            'firstName' => 'José',
            'middleName' => 'Alberto',
            'lastName' => 'Guevara',
            'fullName' => 'José Alberto Guevara',
            'nickName' => 'Josi',
            'gender' => 'male',
            'birthday' => '1980-10-31',
            'governmentIdType' => 'DNI',
            'governmentId' => '28407325',
            'username' => 'admin',
            'email' => 'jose@xerebrumgroup.com',
            'password' => bcrypt('12345678'),
            'status' => '1'
        ])->assignRole('Super Administrador');

        $admin = User::create([
            'firstName' => 'Lisandro',
            'middleName' => '',
            'lastName' => 'Tambone',
            'fullName' => 'Lisandro Tambone',
            'nickName' => 'Lichi',
            'gender' => 'male',
            'birthday' => '1980-12-31',
            'governmentIdType' => 'DNI',
            'governmentId' => '28148606',
            'username' => 'lichi',
            'email' => 'lichitambone@hotmail.com',
            'password' => bcrypt('12345678'),
            'status' => '1'
        ])->assignRole('Administrador');

        $tutor = User::create([
            'firstName' => 'María',
            'middleName' => 'Inés',
            'lastName' => 'Biurrun',
            'fullName' => 'María Inés Biurrun',
            'nickName' => 'Ine',
            'gender' => 'female',
            'birthday' => '1986-01-23',
            'governmentIdType' => 'DNI',
            'governmentId' => '31960863',
            'username' => 'ines',
            'email' => 'biurrunmariaines@gmail.com',
            'password' => bcrypt('12345678'),
            'status' => '1'
        ])->assignRole('Responsable');

        $student = User::create([
            'firstName' => 'Felipe',
            'middleName' => null,
            'lastName' => 'Tambone',
            'fullName' => 'Felipe Tambone',
            'nickName' => 'Feli',
            'gender' => 'male',
            'birthday' => '2018-05-24',
            'governmentIdType' => 'DNI',
            'governmentId' => '57045000',
            'username' => 'felipe',
            'email' => 'lucianaagustin@hotmail.com',
            'password' => bcrypt('12345678'),
            'status' => '1'
        ]);
        
        /*$superAdmin->roles()->attach($superAdminRole);
        $admin->roles()->attach($adminRole);
        $tutor->roles()->attach($tutorRole);
        $student->roles()->attach($studentRole);*/
    }
}
