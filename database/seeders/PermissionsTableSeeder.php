<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //permission users
        Permission::create(['name' => 'users.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'users.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'users.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'users.delete', 'guard_name' => 'web']);

        //permission roles
        Permission::create(['name' => 'roles.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'roles.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'roles.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'roles.delete', 'guard_name' => 'web']);

        //permission permissions
        Permission::create(['name' => 'permissions.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'permissions.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'permissions.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'permissions.delete', 'guard_name' => 'web']);

        //permission settings
        Permission::create(['name' => 'settings.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'settings.update', 'guard_name' => 'web']);

        Permission::create(['name' => 'tarif.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'tarif.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'tarif.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'tarif.delete', 'guard_name' => 'web']);

        Permission::create(['name' => 'pelanggan.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'pelanggan.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'pelanggan.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'pelanggan.delete', 'guard_name' => 'web']);

        Permission::create(['name' => 'penggunaan.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'penggunaan.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'penggunaan.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'penggunaan.delete', 'guard_name' => 'web']);

        Permission::create(['name' => 'tagihan.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'tagihan.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'tagihan.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'tagihan.delete', 'guard_name' => 'web']);

        Permission::create(['name' => 'pembayaran.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'pembayaran.delete', 'guard_name' => 'web']);
    }
}
