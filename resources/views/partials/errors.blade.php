@if ($errors->any())
    <div class="row">
        <div class="col-12">
            <div class="alert alert-primary" role="alert">
                <div class="alert-body">
                    <ul class="">
                        @foreach ($errors->all() as $error)
                            <li class="list-item">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
