@extends('core::layouts.admin.master')

@section('title') {{ __('labels.home') }} @endsection

@section('content')

    @component('core::common-components.breadcrumb')
        @slot('title') {{ __('labels.home') }}  @endslot
        @slot('li_1') {{ __('labels.home') }}  @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1>{{ __('labels.home') }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
