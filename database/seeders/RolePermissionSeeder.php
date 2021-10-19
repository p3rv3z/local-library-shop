<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $this->createDefaultRoles();
    $this->createDefaultPermission();
    $this->assignPermissionsToRole();
  }

  public function createDefaultRoles()
  {
    Role::insert([
      ['name' => 'Super Admin'],
      ['name' => 'Admin'],
      ['name' => 'Editor'],
      ['name' => 'Member'],
    ]);
  }

  public function createDefaultPermission()
  {
    Permission::insert([
      ['name' => 'dashboard'],

      ['name' => 'settings'],

      ['name' => 'collections.create'],
      ['name' => 'collections.edit'],
      ['name' => 'collections.delete'],

    ]);
  }

  public function assignPermissionsToRole()
  {
    Role::findByName('Super Admin')->givePermissionTo([
      'dashboard',
      'settings',
      'collections.create', 'collections.edit', 'collections.delete',
    ]);
  }
}
