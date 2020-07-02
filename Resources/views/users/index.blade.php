@extends('core::layouts.admin.master')

@section('title') {{ __('labels.user') }} @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/toastr/toastr.min.css')}}">
@endsection

@section('content')

    @component('core::common-components.breadcrumb')
        @slot('title') {{ __('labels.user') }} @endslot
        @slot('li_1') {{ __('labels.home') }} @endslot
        @slot('li_2') {{ __('labels.user') }} @endslot
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
                                           placeholder="{{ __('labels.search') }}..."
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
                                        class="mdi mdi-plus mr-1"></i> {{ __('labels.add_new') . ' ' . __('labels.user') }}
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead class="thead-light">
                            <tr>
                                <th>{{ __('labels.name') }}</th>
                                <th>{{ __('labels.email') }}</th>
                                <th>{{ __('labels.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', [$user->id]) }}"
                                           class="mr-3 text-primary" data-toggle="tooltip"
                                           data-placement="top" title=""
                                           data-original-title="{{ __('labels.edit') }}"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['users.destroy', $user->id],
                                                'style'=>'display:inline',
                                                'onsubmit' => 'return confirm("' . __('labels.delete_confirm') . '");'
                                        ]) !!}
                                        <span data-toggle="tooltip"
                                              data-placement="top" title=""
                                              data-original-title="{{ __('labels.delete') }}">
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

    <script src="{{ URL::asset('assets/libs/toastr/toastr.min.js')}}"></script>
    @include('core::common-components.functions.search')
    @include('core::common-components.functions.toastr')

@endsection
