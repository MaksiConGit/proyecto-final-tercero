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

        Permission::create(['name' => 'teachers.create'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'teachers.edit'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'teachers.delete'])->syncRoles([$roleAdmin, $rolePrincipal]);
    }
}
