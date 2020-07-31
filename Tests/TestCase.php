<?php

namespace Modules\Core\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Core\Database\Seeders\LabelPrepareTableSeeder;
use Tests\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use DatabaseMigrations;

    const LOGIN_URL = '/login';

    protected $index_route;
    protected $create_form_route;
    protected $store_route;
    protected $edit_form_route;
    protected $update_route;
    protected $destroy_route;
    protected $entity;

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

    protected function accessEntityList($overrides = [])
    {
        return $this->get(route($this->index_route, $overrides));
    }

    protected function accessCreateEntityForm()
    {
        return $this->get(route($this->create_form_route));
    }

    protected function storeEntity($overrides = [])
    {
        return $this->post(route($this->store_route), $overrides);
    }

    protected function accessEditEntityForm()
    {
        return $this->get(route($this->edit_form_route, $this->entity->id));
    }

    protected function updateEntity($overrides = [])
    {
        return $this->patch(route($this->update_route, $this->entity->id), $overrides);
    }

    protected function deleteEntity()
    {
        return $this->delete(route($this->destroy_route, $this->entity->id));
    }
}
