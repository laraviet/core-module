@if ($message = Session::get(config('constant.session_success')))
    <script>
        toastr.success('{{ $message }}');
    </script>
@endif
