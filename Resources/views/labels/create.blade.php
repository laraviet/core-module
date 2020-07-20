@extends('layouts.admin.master')

@section('title') {{ _t('create') . ' ' . _t('label') }} @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ _t('label') }} @endslot
        @slot('li_1') {{ _t('home') }} @endslot
        @slot('li_2') {{ _t('create') . ' ' . _t('label') }} @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ _t('create_new') . ' ' . _t('label') }}</h4>

                    @include('common-components.forms.alert-error')

                    {!! Form::open(['route' => 'labels.store','method'=>'POST', 'class' => 'outer-repeater']) !!}
                    <div data-repeater-list="outer-group" class="outer">
                        @include('core::labels._form')
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit"
                                    class="btn btn-primary">{{ _t('create') . ' ' . _t('label') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
