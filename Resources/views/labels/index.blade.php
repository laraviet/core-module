@extends('layouts.admin.master')

@section('title') {{ _t('label') }} @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ _t('label') }} @endslot
        @slot('li_1') {{ _t('home') }} @endslot
        @slot('li_2') {{ _t('label') }} @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-right">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <input type="text"
                                           class="form-control"
                                           id="search-box"
                                           placeholder="{{ _t('search') }}..."
                                           @if ($search = request()->get('filter')['search'])
                                           value="{{ $search  }}"
                                           @endif
                                           onkeypress="return search(event, '{{ route('labels.index') }}')"
                                    />
                                    <i class="bx bx-search-alt search-icon"
                                       onclick="return redirectWithSearch('{{ route('labels.index') }}')"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead class="thead-light">
                            <tr>
                                <th>{{ _t('key') }}</th>
                                <th>{{ _t('value') }}</th>
                                <th class="text-center">{{ _t('action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($labels as $label)
                                <tr>
                                    <td>{{ $label->key }}</td>
                                    <td>{{ $label->value }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('labels.edit', [$label->id]) }}"
                                           class="mr-3 text-primary" data-toggle="tooltip"
                                           data-placement="top" title=""
                                           data-original-title="{{ _t('edit') }}">
                                            <i class="mdi mdi-pencil font-size-18"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination pagination-rounded justify-content-end mb-2">
                        {{ $labels->withQueryString()->links() }}
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
