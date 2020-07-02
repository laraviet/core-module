<?php

namespace Modules\Core\Tests\Concerns;

use App\User;

trait AuthRoute
{
    protected function setUp(): void
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }
}
