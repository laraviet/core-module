<?php

namespace Modules\Core\Tests\Concerns;

trait ReadEntityTest
{
    /** @test */
    public function unauthenticated_users_can_not_access_list()
    {
        $this->accessEntityList()
            ->assertRedirect(self::LOGIN_URL);
    }

    /** @test */
    public function authenticated_users_can_access_list()
    {
        $this->signIn();

        $this->accessEntityList()
            ->assertSee($this->entity->name);
    }
}
