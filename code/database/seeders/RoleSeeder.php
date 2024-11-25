<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $rolePrincipal = Role::create(['name' => 'principal']);
        $roleTeacher = Role::create(['name' => 'teacher']);
        $roleStudent = Role::create(['name' => 'student']);

        Permission::create(['name' => 'see.info'])->syncRoles([$roleAdmin, $rolePrincipal]);


        Permission::create(['name' => 'students.index'])->syncRoles([$roleAdmin, $rolePrincipal, $roleTeacher, $roleStudent]);
        Permission::create(['name' => 'students.create'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'students.edit'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'students.destroy'])->syncRoles([$roleAdmin, $rolePrincipal]);

        Permission::create(['name' => 'teachers.index']);
        Permission::create(['name' => 'teachers.create'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'teachers.edit'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'teachers.destroy'])->syncRoles([$roleAdmin, $rolePrincipal]);

        Permission::create(['name' => 'principals.index'])->syncRoles([$roleAdmin, $rolePrincipal, $roleTeacher, $roleStudent]);
        Permission::create(['name' => 'principals.create'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'principals.edit'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'principals.destroy'])->syncRoles([$roleAdmin, $rolePrincipal]);

        Permission::create(['name' => 'careers.create'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'careers.edit'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'careers.destroy'])->syncRoles([$roleAdmin, $rolePrincipal]);

        Permission::create(['name' => 'courses.create'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'courses.edit'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'courses.destroy'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'courses.assignCourse'])->syncRoles([$roleAdmin, $rolePrincipal]);

        Permission::create(['name' => 'subjects.index'])->syncRoles([$roleAdmin, $rolePrincipal, $roleTeacher, $roleStudent]);
        Permission::create(['name' => 'subjects.create'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'subjects.edit'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'subjects.destroy'])->syncRoles([$roleAdmin, $rolePrincipal]);


    }
}
