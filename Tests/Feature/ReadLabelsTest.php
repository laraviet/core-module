<?php

namespace Modules\Core\Tests\Feature;

use Modules\Core\Entities\Label;
use Modules\Core\Tests\TestCase;

class ReadLabelsTest extends TestCase
{
    /** @test */
    public function unauthorized_users_may_not_view_label_list()
    {
        $this->get(route('labels.index'))
            ->assertRedirect(self::LOGIN_URL);
    }

    /** @test */
    public function authorized_users_can_view_label_list()
    {
        $this->signIn();

        $label = create(Label::class);

        $this->get(route('labels.index'))
            ->assertSee($label->key)
            ->assertSee($label->value);
    }

    /** @test */
    public function labels_can_be_searched_by_key_and_by_value()
    {
        $this->signIn();

        $label = create(Label::class);
        $otherLabel = create(Label::class);

        $this->get(route('labels.index', ['filter[search]' => $label->key]))
            ->assertSee($label->key)
            ->assertDontSee($otherLabel->key);

        $this->get(route('labels.index', ['filter[search]' => $label->value]))
            ->assertSee($label->value)
            ->assertDontSee($otherLabel->value);
    }
}
