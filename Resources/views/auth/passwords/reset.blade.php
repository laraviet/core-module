@extends('layouts.admin.master-without-nav')

@section('title')
    {{ _t('reset_pwd') }}
@endsection

@section('body')
    <body>
    @endsection

    @section('content')
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">{{ _t('reset_pwd') }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ theme_url('assets/images/profile-img.png') }}" alt=""
                                             class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="card-body">
                                    <div class="p-2">
                                        @include('common-components.forms.alert-error')

                                        {!! Form::open(['route' => 'password.update','method'=>'POST', 'class' => 'form-horizontal']) !!}

                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="form-group">
                                            <label for="email">{{ _t('email') }}</label>
                                            {!! Form::text('email', $email ?? old('email'), ['placeholder' => _t('email'),'class' => 'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            <label for="password">{{ _t('password') }}</label>
                                            {!! Form::password('password', ['placeholder' => _t('password'),'class' => 'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            <label for="password">{{ _t('confirm_password') }}</label>
                                            {!! Form::password('password_confirmation', ['placeholder' => _t('confirm_password'),'class' => 'form-control']) !!}
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light"
                                                    type="submit">{{ _t('reset_pwd') }}
                                            </button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>
                                ©
                                <script>document.write(new Date().getFullYear())</script>
                                {{ config('app.name') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
@endsection
