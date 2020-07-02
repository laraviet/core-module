@if ($message = Session::get(config('core.session_success')))
    <script>
        toastr.success('{{ $message }}');
    </script>
@endif
