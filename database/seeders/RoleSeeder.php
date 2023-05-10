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
        $role = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'admin.dashboard.index', 'description' => 'Ver panel avanzado'])->syncRoles($role);

        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver roles'])->syncRoles($role);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear roles'])->syncRoles($role);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar roles'])->syncRoles($role);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar roles'])->syncRoles($role);

        Permission::create(['name' => 'admin.areas.index', 'description' => 'Ver áreas'])->syncRoles($role);
        Permission::create(['name' => 'admin.areas.create', 'description' => 'Crear áreas'])->syncRoles($role);
        Permission::create(['name' => 'admin.areas.edit', 'description' => 'Editar áreas'])->syncRoles($role);
        Permission::create(['name' => 'admin.areas.destroy', 'description' => 'Eliminar áreas'])->syncRoles($role);

        Permission::create(['name' => 'admin.users.index', 'description' => 'Ver usuarios'])->syncRoles($role);
        Permission::create(['name' => 'admin.users.create', 'description' => 'Crear usuarios'])->syncRoles($role);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Editar usuarios'])->syncRoles($role);
        Permission::create(['name' => 'admin.users.destroy', 'description' => 'Eliminar usuarios'])->syncRoles($role);

        Permission::create(['name' => 'admin.customers.index', 'description' => 'Ver clientes'])->syncRoles($role);
        Permission::create(['name' => 'admin.customers.create', 'description' => 'Crear clientes'])->syncRoles($role);
        Permission::create(['name' => 'admin.customers.edit', 'description' => 'Editar clientes'])->syncRoles($role);
        Permission::create(['name' => 'admin.customers.destroy', 'description' => 'Eliminar clientes'])->syncRoles($role);

        Permission::create(['name' => 'admin.categories.index', 'description' => 'Ver categorias'])->syncRoles($role);
        Permission::create(['name' => 'admin.categories.create', 'description' => 'Crear categorias'])->syncRoles($role);
        Permission::create(['name' => 'admin.categories.edit', 'description' => 'Editar categorias'])->syncRoles($role);
        Permission::create(['name' => 'admin.categories.destroy', 'description' => 'Eliminar categorias'])->syncRoles($role);

        Permission::create(['name' => 'admin.requirements.index', 'description' => 'Ver requerimientos'])->syncRoles($role);
        Permission::create(['name' => 'admin.requirements.create', 'description' => 'Crear requerimientos'])->syncRoles($role);
        Permission::create(['name' => 'admin.requirements.edit', 'description' => 'Editar requerimientos'])->syncRoles($role);
        Permission::create(['name' => 'admin.requirements.destroy', 'description' => 'Eliminar requerimientos'])->syncRoles($role);

        Permission::create(['name' => 'admin.typeprocedures.index', 'description' => 'Ver tipos de trámites'])->syncRoles($role);
        Permission::create(['name' => 'admin.typeprocedures.create', 'description' => 'Crear tipos de trámites'])->syncRoles($role);
        Permission::create(['name' => 'admin.typeprocedures.edit', 'description' => 'Editar tipos de trámites'])->syncRoles($role);
        Permission::create(['name' => 'admin.typeprocedures.destroy', 'description' => 'Eliminar tipos de trámites'])->syncRoles($role);

        Permission::create(['name' => 'admin.procedures.index', 'description' => 'Ver trámites'])->syncRoles($role);
        Permission::create(['name' => 'admin.procedures.create', 'description' => 'Crear trámites'])->syncRoles($role);
        Permission::create(['name' => 'admin.procedures.assign_me', 'description' => 'Asignarse trámites'])->syncRoles($role);
        Permission::create(['name' => 'admin.procedures.assign_area', 'description' => 'Asignar trámites a área'])->syncRoles($role);
        Permission::create(['name' => 'admin.procedures.assign_user', 'description' => 'Asignar trámites a usuario'])->syncRoles($role);
        Permission::create(['name' => 'admin.procedures.edit', 'description' => 'Editar trámites'])->syncRoles($role);
        Permission::create(['name' => 'admin.procedures.destroy', 'description' => 'Eliminar trámites'])->syncRoles($role);
        

    }
}
