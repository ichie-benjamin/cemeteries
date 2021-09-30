
@if(Session::has('error_message'))
    <script>
        toastr.error("{!! session('error_message') !!}")
    </script>
@endif

@if(Session::has('success_message'))
    <script>
        toastr.success("{!! session('success_message') !!}")
    </script>
@endif

@if ($errors->any())
    <script>
        toastr.error('An error prevented your form from saving')
    </script>
@endif


