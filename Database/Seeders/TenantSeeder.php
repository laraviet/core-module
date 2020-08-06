<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LabelPrepareTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(AdminUserTableSeeder::class);
    }
}
