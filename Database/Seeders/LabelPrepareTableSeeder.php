<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Nwidart\Modules\Facades\Module;

class LabelPrepareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        foreach (Module::allEnabled() as $module) {
            if (file_exists($module->getPath() . "/Database/Seeders/LabelTableSeeder.php")) {
                $seedClass = "Modules\\{$module->getName()}\\Database\\Seeders\\LabelTableSeeder";
                $this->call($seedClass);
            }
        }
    }
}
