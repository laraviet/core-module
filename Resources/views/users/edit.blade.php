@extends('layouts.admin.master')

@section('title') {{ _t('edit') . ' ' . _t('user') }} @endsection

@section('css')
    <!-- Bootstrap Rating css -->
    <link rel="stylesheet" type="text/css"
          href="{{ theme_url('assets/libs/bootstrap-rating/bootstrap-rating.min.css')}}">
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ _t('user') }} @endslot
        @slot('li_1') {{ _t('home') }} @endslot
        @slot('li_2') {{ _t('edit') . ' ' . _t('user') }} @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ _t('edit') . ' ' . _t('user') }}</h4>

                    @include('common-components.forms.alert-error')

                    {!! Form::model($user, ['route' => ['users.update', $user->id],'method'=>'PATCH', 'class' => 'outer-repeater']) !!}
                    <div data-repeater-list="outer-group" class="outer">
                        @include('core::users._form')
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit"
                                    class="btn btn-primary">{{ _t('update') . ' ' . _t('user') }}</button>
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
