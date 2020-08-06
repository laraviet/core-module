<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Core\Entities\Permission;
use Modules\Core\Entities\Role;
use Modules\Core\Entities\User;

class AdminUserTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->enableForeignKeys();

        $role = Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        if ( ! config('core.saas_enable')) {
            $this->truncate('users');
            $user = User::create([
                'name'     => 'Admin',
                'email'    => 'admin@gmail.com',
                'password' => bcrypt('123456')
            ]);
            $user->assignRole([$role->id]);
        }

        $this->enableForeignKeys();
    }
}
