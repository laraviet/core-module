<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') name @endslot
        @slot('label') {{ __('core::labels.name') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('core::labels.name') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') email @endslot
        @slot('label') {{ __('core::labels.email') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('core::labels.email') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.password')
        @slot('field') password @endslot
        @slot('label') {{ __('core::labels.password') }} @endslot
        @slot('placeholder') {{ __('core::labels.password') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.password')
        @slot('field') confirm-password @endslot
        @slot('label') {{ __('core::labels.confirm_password') }} @endslot
        @slot('placeholder') {{ __('core::labels.confirm_password') . '...' }} @endslot
    @endcomponent
</div>
