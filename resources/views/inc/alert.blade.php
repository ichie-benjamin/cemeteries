@if(Session::has('success_message'))
    <div class="col-12">
        <div class="alert alert-success">
            <div class="alert-body">
                <span class="glyphicon glyphicon-ok"></span>
                {!! session('success_message') !!}
            </div>

        </div>
    </div>
@endif
