@if(session()->has('success_message'))
    <div class="col-12">
        <div class="alert alert-success">
            <div class="alert-body">
                <span class="glyphicon glyphicon-ok"></span>
                {!! session('success_message') !!}

                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    </div>
@endif

