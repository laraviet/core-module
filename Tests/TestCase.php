<?php

namespace Modules\Core\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Core\Database\Seeders\LabelPrepareTableSeeder;
use Tests\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use DatabaseMigrations;

    const LOGIN_URL = '/login';

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(LabelPrepareTableSeeder::class);
    }

    protected
    function signIn($user = null)
    {
        $user = $user ?: create('App\User');

        $this->actingAs($user);

        return $this;
    }
}
