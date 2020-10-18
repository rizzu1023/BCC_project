@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
        <button type="button" class="close fa fa-times text-danger" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
    </div>
@endif
