@if(session()->has('message'))
                <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close fa fa-times text-danger" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
              </div>
			@endif