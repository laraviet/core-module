<?php

namespace Modules\Core\Tests\Concerns;

trait DeleteEntityTest
{
    /** @test */
    public function unauthenticated_users_can_not_delete_entity()
    {
        $this->deleteEntity()
            ->assertRedirect(self::LOGIN_URL);
    }

    /** @test */
    public function authenticated_users_can_delete_entity()
    {
        $this->signIn();

        $this->deleteEntity()
            ->assertRedirect(route($this->index_route));
    }
}
