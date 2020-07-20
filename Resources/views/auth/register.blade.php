@extends('layouts.admin.master-without-nav')

@section('title')
    {{ _t('register') }}
@endsection

@section('body')
    <body>
    @endsection

    @section('content')
        <div class="home-btn d-none d-sm-block">
            <a href="index" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome!</h5>
                                            <p>Register to continue to {{ config('app.name') }}.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ theme_url('assets/images/profile-img.png') }}" alt=""
                                             class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>

                                </div>
                                <div class="p-2">
                                    @include('common-components.forms.alert-error')

                                    {!! Form::open(['route' => 'register','method'=>'POST', 'class' => 'form-horizontal']) !!}

                                    <div class="form-group">
                                        <label for="name">{{ _t('name') }}</label>
                                        {!! Form::text('name', null, ['placeholder' => _t('name'),'class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="email">{{ _t('email') }}</label>
                                        {!! Form::text('email', null, ['placeholder' => _t('email'),'class' => 'form-control']) !!}
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
                                                type="submit">{{ _t('register') }}
                                        </button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>{{ _t('has_account') }}
                                <a href="{{ route('login') }}"
                                   class="font-weight-medium text-primary">{{ _t('login') }}
                                </a>
                            </p>
                            <p>
                                ©
                                <script>document.write(new Date().getFullYear())</script>
                                {{ config('app.name') }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
