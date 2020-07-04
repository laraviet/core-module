@extends('layouts.admin.master')

@section('title') {{ __('core::labels.edit') . ' ' . __('core::labels.user') }} @endsection

@section('css')
    <!-- Bootstrap Rating css -->
    <link rel="stylesheet" type="text/css"
          href="{{ theme_url('assets/libs/bootstrap-rating/bootstrap-rating.min.css')}}">
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ __('core::labels.user') }} @endslot
        @slot('li_1') {{ __('core::labels.home') }} @endslot
        @slot('li_2') {{ __('core::labels.edit') . ' ' . __('core::labels.user') }} @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ __('core::labels.edit') . ' ' . __('core::labels.user') }}</h4>

                    @include('common-components.forms.alert-error')

                    {!! Form::model($user, ['route' => ['users.update', $user->id],'method'=>'PATCH', 'class' => 'outer-repeater']) !!}
                    <div data-repeater-list="outer-group" class="outer">
                        @include('core::users._form')
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit"
                                    class="btn btn-primary">{{ __('core::labels.update') . ' ' . __('core::labels.user') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection

@section('script')

    <!-- Bootstrap rating js -->
    <script src="{{ theme_url('assets/libs/bootstrap-rating/bootstrap-rating.min.js')}}"></script>

    <!-- Range slider init js -->
    <script src="{{ theme_url('assets/js/pages/rating-init.js')}}"></script>

@endsection
