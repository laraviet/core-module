<?php

namespace Modules\Core\Tests\Concerns;

trait CreateEntityTest
{
    /** @test */
    public function unauthenticated_users_can_not_access_create__form()
    {
        $this->accessCreateEntityForm()
            ->assertRedirect(self::LOGIN_URL);
    }

    /** @test */
    public function authenticated_users_can_access_create_form()
    {
        $this->signIn();

        $this->accessCreateEntityForm()
            ->assertStatus(200);
    }

    /** @test */
    public function unauthenticated_users_can_not_store_entity()
    {
        $this->storeEntity()
            ->assertRedirect(self::LOGIN_URL);
    }
}
