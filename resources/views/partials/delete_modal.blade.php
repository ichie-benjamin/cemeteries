<div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=""> Are you sure you want to delete this {{ $name }} ? </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ $route }}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="mb-1">
                        <p> Deleting this {{ $name }} means you will loose all the data you previously saved under this
                            {{ $name }}. </p>
                        <div class="mb-1 text-md-end">
                            <button type="button" class="btn btn-primary-outline waves-effect waves-float waves-light" data-bs-dismiss="modal">Cancel</button>

                            <button type="submit" class="btn btn-primary red-bg waves-effect waves-float waves-light" >Yes, delete it</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
