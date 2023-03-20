<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Admin => all
     * User => view words
     * visitor => play game fo words
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $visitor =  Role::create(['name' => 'Visitor']);

        Permission::create(['name' => 'word.index'])->syncRoles([$admin, $visitor]);
        Permission::create(['name' => 'word.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'word.show'])->syncRoles([$admin, $visitor]);
        Permission::create(['name' => 'word.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'word.delete'])->syncRoles([$admin]);
        Permission::create(['name' => 'words'])->syncRoles([$admin, $visitor]);


        Permission::create(['name' => 'user.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.crate'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.delete'])->syncRoles([$admin]);
    }
}
