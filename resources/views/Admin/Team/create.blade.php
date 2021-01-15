


@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Dashboard</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                            {{--              <li class="breadcrumb-item active">Product list</li>--}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="form-body">
                        <form id="comment" action="{{route('teams.store')}}" method="POST" >
                            @csrf
                            <div class="form-group">
                                <label for="field1">Team Code</label>
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
                            <button type="submit" class="btn btn-success btn-submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
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

{{--                url:'{{Route('team.store')}}',--}}

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
