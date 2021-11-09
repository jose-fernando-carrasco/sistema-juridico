<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        $admin = Role::create(['name'=>'Admin']);
        $abogado = Role::create(['name'=>'Abogado']);
        $juez = Role::create(['name'=>'Juez']);
        $procurador = Role::create(['name'=>'Procurador']);
        
        /*Permisos Generales*/
        Permission::create(['name'=>'/'])->syncRoles([$admin,$abogado,$juez,$procurador]);
        Permission::create(['name'=>'dashboard'])->syncRoles([$admin,$abogado,$juez,$procurador]);

        /*Permisos de Admin*/
        Permission::create(['name'=>'admin.users.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.users.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.users.update'])->syncRoles([$admin]);

        /*Permisos De los Casos*/
        Permission::create(['name'=>'caso.index'])->syncRoles([$admin,$abogado,$juez,$procurador]);
        Permission::create(['name'=>'caso.update'])->syncRoles([$juez]);
        Permission::create(['name'=>'caso.buscar'])->syncRoles([$abogado]);
        Permission::create(['name'=>'caso.crear'])->syncRoles([$abogado]);
        Permission::create(['name'=>'caso.solicitudes_index'])->syncRoles([$admin]);
        Permission::create(['name'=>'caso.invitaciones.index'])->syncRoles([$procurador]);
        

        /*Permisos Acerca de los Procuradores*/
        Permission::create(['name'=>'procuradores.index'])->syncRoles([$admin,$abogado]);
        
        Permission::create(['name'=>'procuradores.buscar'])->syncRoles([$abogado]);
        

        /*Permisos Acerca de los Expedientes*/
        
        Permission::create(['name'=>'expediente.archivadosindex'])->syncRoles([$admin]);
        /* Permission::create(['name'=>'bitacora.index'])->syncRoles([$admin]); */

    }
}
