@extends('core::layouts.admin.master')

@section('title') {{ __('labels.create') . ' ' . __('labels.user') }} @endsection

@section('css')
    <!-- Bootstrap Rating css -->
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('assets/libs/bootstrap-rating/bootstrap-rating.min.css')}}">
@endsection

@section('content')

    @component('core::common-components.breadcrumb')
        @slot('title') {{ __('labels.user') }} @endslot
        @slot('li_1') {{ __('labels.home') }} @endslot
        @slot('li_2') {{ __('labels.create') . ' ' . __('labels.user') }} @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ __('labels.create_new') . ' ' . __('labels.user') }}</h4>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> {{ __('labels.problem_msg') }}<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::open(['route' => 'users.store','method'=>'POST', 'class' => 'outer-repeater']) !!}
                    <div data-repeater-list="outer-group" class="outer">
                        @include('core::users._form')
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit"
                                    class="btn btn-primary">{{ __('labels.create') . ' ' . __('labels.user') }}</button>
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
    <script src="{{ URL::asset('assets/libs/bootstrap-rating/bootstrap-rating.min.js')}}"></script>

    <!-- Range slider init js -->
    <script src="{{ URL::asset('assets/js/pages/rating-init.js')}}"></script>

@endsection
