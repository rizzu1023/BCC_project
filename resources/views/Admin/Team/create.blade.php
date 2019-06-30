@extends('Admin.layouts.base')
@section('css')

<meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection
@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Add Team</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms">

						<div class="form-body">
							<!-- <form method="POST" action="{{route('Team.store')}}"> -->
							<form id="comment">
							@csrf
								<div class="form-group">
									<label for="field1">Team Code{{$message}}</label>
									<input type="text" class="form-control" id="field1" name="team_code" placeholder="eg. MI">
								</div>
								<div class="form-group">
									<label for="field1">Team Name</label>
									<input type="text" class="form-control" id="field1" name="team_name" placeholder="eg. Mumbai Indians">
								</div> 
								<div class="form-group">
									<label for="field1">Team Title</label>
									<input type="text" class="form-control" id="field1" name="team_title" placeholder="eg .2">
								</div>
								<button type="submit" class="btn btn-default btn-submit">Submit</button> 
							</form>
						</div>
				</div>
			</div>
</div>

@endsection

@section('script')

<script type="text/javascript">


    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


    $("#comment").on('submit',function(e){
        e.preventDefault();

        // var team_code = $("input[name=team_code]").val();
        // var team_name = $("input[name=team_name]").val();
        // var team_title = $("input[name=team_title]").val();

        $.ajax({

           type:'POST',

           url:'{{Route('Team.store')}}',

        //    data:{team_code:team_code, team_name:team_name, team_title:team_title},
		   data: $(this).serialize(),

           success:function(data){

              alert(data.message);
			// $('.title1').html(data.message);
           }

        });


	});

</script>
@endsection
