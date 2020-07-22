<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') name @endslot
        @slot('label') {{ _t('name') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('name') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') email @endslot
        @slot('label') {{ _t('email') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('email') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.image-view')
        @slot('path') {{ isset($user) ? $user->avatar : noImage() }} @endslot
    @endcomponent

    @component('common-components.forms.password')
        @slot('field') password @endslot
        @slot('label') {{ _t('password') }} @endslot
        @slot('placeholder') {{ _t('password') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.password')
        @slot('field') confirm-password @endslot
        @slot('label') {{ _t('confirm_password') }} @endslot
        @slot('placeholder') {{ _t('confirm_password') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.file')
        @slot('field') avatar @endslot
        @slot('label') Choose file @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . 'avatar' . '...' }} @endslot
    @endcomponent
</div>
