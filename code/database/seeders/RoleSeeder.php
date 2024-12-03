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
        $roleAdmin = Role::create(['name' => 'Admin']);
        $rolePrincipal = Role::create(['name' => 'Principal']);
        $roleTeacher = Role::create(['name' => 'Teacher']);
        $roleStudent = Role::create(['name' => 'Student']);

        Permission::create(['name' => 'grades.create'])->syncRoles([$roleAdmin, $rolePrincipal, $roleTeacher]);
        Permission::create(['name' => 'grades.edit'])->syncRoles([$roleAdmin, $rolePrincipal, $roleTeacher]);
        Permission::create(['name' => 'grades.delete'])->syncRoles([$roleAdmin, $rolePrincipal, $roleTeacher]);
    }
}
