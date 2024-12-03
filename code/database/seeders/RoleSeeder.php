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

        Permission::create(['name' => 'exams.create'])->syncRoles([$roleAdmin, $rolePrincipal, $roleTeacher]);
        Permission::create(['name' => 'exams.edit'])->syncRoles([$roleAdmin, $rolePrincipal, $roleTeacher]);
        Permission::create(['name' => 'exams.delete'])->syncRoles([$roleAdmin, $rolePrincipal, $roleTeacher]);

        Permission::create(['name' => 'timetables.create'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'timetables.edit'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'timetables.delete'])->syncRoles([$roleAdmin, $rolePrincipal]);

        Permission::create(['name' => 'attendance_records.create'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'attendance_records.edit'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'attendance_records.delete'])->syncRoles([$roleAdmin, $rolePrincipal]);

        Permission::create(['name' => 'grades.create'])->syncRoles([$roleAdmin, $rolePrincipal, $roleTeacher]);
        Permission::create(['name' => 'grades.edit'])->syncRoles([$roleAdmin, $rolePrincipal, $roleTeacher]);
        Permission::create(['name' => 'grades.delete'])->syncRoles([$roleAdmin, $rolePrincipal, $roleTeacher]);
      
        Permission::create(['name' => 'teachers.create'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'teachers.edit'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'teachers.delete'])->syncRoles([$roleAdmin, $rolePrincipal]);

        Permission::create(['name' => 'students.create'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'students.edit'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'students.delete'])->syncRoles([$roleAdmin, $rolePrincipal]);

        Permission::create(['name' => 'institutions.create'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'institutions.edit'])->syncRoles([$roleAdmin, $rolePrincipal]);
        Permission::create(['name' => 'institutions.delete'])->syncRoles([$roleAdmin, $rolePrincipal]);
    }
}
