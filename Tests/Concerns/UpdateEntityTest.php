<?php

namespace Modules\Core\Tests\Concerns;

trait UpdateEntityTest
{
    /** @test */
    public function unauthenticated_users_can_not_access_edit_category_form()
    {
        $this->accessEditEntityForm()
            ->assertRedirect(self::LOGIN_URL);
    }

    /** @test */
    public function authenticated_users_can_access_edit_category_form()
    {
        $this->signIn();

        $this->accessEditEntityForm()
            ->assertSee($this->entity->name)
            ->assertSee($this->entity->statusName)
            ->assertSee($this->entity->thumbnail);
    }

    /** @test */
    public function unauthenticated_users_can_not_update_blog_category()
    {
        $this->updateEntity()
            ->assertRedirect(self::LOGIN_URL);
    }
}
