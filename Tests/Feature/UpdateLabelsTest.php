<?php

namespace Modules\Core\Tests\Feature;

use Modules\Core\Entities\Label;
use Modules\Core\Tests\TestCase;

class UpdateLabelsTest extends TestCase
{

    protected $label;

    protected function setUp(): void
    {
        parent::setUp();
        $this->label = create(Label::class);
    }

    private function updateLabel($overrides = [])
    {
        return $this->patch(route('labels.update', $this->label->id), $overrides);
    }

    /** @test */
    public function unauthenticated_users_can_not_access_edit_form()
    {
        $this->get(route('labels.edit', $this->label->id))
            ->assertRedirect(self::LOGIN_URL);
    }

    /** @test */
    public function authenticated_users_can_access_edit_form()
    {
        $this->signIn();

        $this->get(route('labels.edit', $this->label->id))
            ->assertSee($this->label->key)
            ->assertSee($this->label->value);
    }

    /** @test */
    public function unauthenticated_users_can_not_update_a_label()
    {
        $this->updateLabel()
            ->assertRedirect(self::LOGIN_URL);
    }

    /** @test */
    public function authenticated_users_can_update_a_label()
    {
        $this->signIn();

        $this->updateLabel([
            'key'                   => 'key changed',
            localize_field('value') => 'value changed',
        ]);

        tap($this->label->fresh(), function ($label) {
            $this->assertEquals('key changed', $label->key);
            $this->assertEquals('value changed', $label->value);
        });
    }

    /** @test */
    public function a_label_required_a_key_and_a_value_to_be_updated()
    {
        $this->signIn();

        $this->updateLabel(['key' => 'key changed',])->assertSessionHasErrors(localize_field('value'));

        $this->updateLabel([localize_field('value') => 'value changed'])->assertSessionHasErrors('key');
    }
}
