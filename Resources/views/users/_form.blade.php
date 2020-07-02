<div data-repeater-item class="outer">
    @component('core::common-components.forms.text')
        @slot('field') name @endslot
        @slot('label') {{ __('labels.name') }} @endslot
        @slot('placeholder') {{ __('labels.enter') . ' ' . __('labels.name') . '...' }} @endslot
    @endcomponent

    @component('core::common-components.forms.text')
        @slot('field') email @endslot
        @slot('label') {{ __('labels.email') }} @endslot
        @slot('placeholder') {{ __('labels.enter') . ' ' . __('labels.email') . '...' }} @endslot
    @endcomponent

    @component('core::common-components.forms.password')
        @slot('field') password @endslot
        @slot('label') {{ __('labels.password') }} @endslot
        @slot('placeholder') {{ __('labels.password') . '...' }} @endslot
    @endcomponent

    @component('core::common-components.forms.password')
        @slot('field') confirm-password @endslot
        @slot('label') {{ __('labels.confirm_password') }} @endslot
        @slot('placeholder') {{ __('labels.confirm_password') . '...' }} @endslot
    @endcomponent
</div>
