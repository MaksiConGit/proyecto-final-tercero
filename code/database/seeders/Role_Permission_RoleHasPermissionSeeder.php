<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;

class Role_Permission_RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create(['name' => 'admin']);
        Role::factory()->create(['name' => 'principal']);
        Role::factory()->create(['name' => 'student']);
        Role::factory()->create(['name' => 'teacher']);

        Permission::factory(10)->create();

        //Bucle que inserta la cantidad de registros que se quiere
        for ($i = 1; $i <= 20; $i++) {
            //Busco la tabla role_has_permissions y le inserto...
            FacadesDB::table('role_has_permissions')->insert([
                //Role:all busca todos los registros de la tabla Role, random() selecciona uno al azar y id es elcampo que quiero insertar.
                'role_id' => Role::all()->random()->id,
                //Permission:all busca todos los registros de la tabla Permission, random() selecciona uno al azar y id es elcampo que quiero insertar.
                'permission_id' => Permission::all()->random()->id,
            ]);
        }
    }
}
