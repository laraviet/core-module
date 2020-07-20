<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') key @endslot
        @slot('label') {{ _t('key') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('key') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') {{localize_field('value')}} @endslot
        @slot('label') {{ _t('value') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('value') . '...' }} @endslot
    @endcomponent
</div>
