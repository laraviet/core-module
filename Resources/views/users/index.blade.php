@extends('layouts.admin.master')

@section('title') {{ _t('user') }} @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ _t('user') }} @endslot
        @slot('li_1') {{ _t('home') }} @endslot
        @slot('li_2') {{ _t('user') }} @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <input type="text"
                                           class="form-control"
                                           id="search-box"
                                           placeholder="{{ _t('search') }}..."
                                           @if ($search = request()->get('filter')['search'])
                                           value="{{ $search  }}"
                                           @endif
                                           onkeypress="return search(event, '{{ route('users.index') }}')"
                                    />
                                    <i class="bx bx-search-alt search-icon"
                                       onclick="return redirectWithSearch('{{ route('users.index') }}')"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a type="button" style="color: white;" href="{{ route('users.create') }}"
                                   class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                        class="mdi mdi-plus mr-1"></i> {{ _t('add_new') . ' ' . _t('user') }}
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead class="thead-light">
                            <tr>
                                <th>{{ _t('name') }}</th>
                                <th>{{ _t('email') }}</th>
                                <th>{{ _t('avatar') }}</th>
                                @if(config('core.role_management'))
                                    <th>{{ _t('role') }}</th>
                                @endif
                                <th>{{ _t('action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <img
                                            src="{{ url($user->avatar) }}"/>
                                    </td>
                                    @if(config('core.role_management'))
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $v)
                                                    <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{ route('users.edit', [$user->id]) }}"
                                           class="mr-3 text-primary" data-toggle="tooltip"
                                           data-placement="top" title=""
                                           data-original-title="{{ _t('edit') }}"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['users.destroy', $user->id],
                                                'style'=>'display:inline',
                                                'onsubmit' => 'return confirm("' . _t('delete_confirm') . '");'
                                        ]) !!}
                                        <span data-toggle="tooltip"
                                              data-placement="top" title=""
                                              data-original-title="{{ _t('delete') }}">
                                            <button type="submit"
                                                    style="background: transparent; border: transparent; padding: 0;">
                                                <i class="mdi mdi-close font-size-18 text-danger"></i>
                                            </button>
                                        </span>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination pagination-rounded justify-content-end mb-2">
                        {{ $users->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')

    @include('common-components.functions.search')
    @include('common-components.functions.toastr')

@endsection
