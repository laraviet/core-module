@extends('layouts.admin.master-without-nav')

@section('title')
    {{ _t('login') }}
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
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue to ViralSoft.</p>
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

                                    {!! Form::open(['route' => 'login','method'=>'POST', 'class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                        <label for="email">{{ _t('email') }}</label>
                                        {!! Form::text('email', null, ['placeholder' => _t('email'),'class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ _t('password') }}</label>
                                        {!! Form::password('password', ['placeholder' => _t('password'),'class' => 'form-control']) !!}
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label"
                                               for="remember">{{ _t('remember_me') }}</label>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                                type="submit">{{ _t('login') }}
                                        </button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            ©
                            <script>document.write(new Date().getFullYear())</script>
                            ViralSoft
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
