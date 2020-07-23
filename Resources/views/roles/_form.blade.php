<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') name @endslot
        @slot('label') {{ _t('name') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('name') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.checkbox-list', [
        'list' => $permission
    ])
        @slot('field') permission[] @endslot
        @slot('label') {{ _t('permission') }} @endslot
    @endcomponent
</div>
