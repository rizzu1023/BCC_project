@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>{{ $tournament->tournament_name }} Groups</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="/admin/Tournament">Tournaments</a></li>
                            <li class="breadcrumb-item active">Groups</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Create Group</button>
                    {{--                            <button class="btn btn-primary" type="button" ><i class="fa fa-plus"></i>Attributes</button>--}}
                </div>
                <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-styling" id="group-table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th class="w-25" scope="col">Group Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody id="group-table-body">
                                @foreach($groups as $g)
                                    <tr id="{{$g->id}}">
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td >{{$g->group_name}}</td>
                                        <td>
                                            <a class='btn btn-sm btn-outline-primary' href='/admin/groups/{{$g->id}}/teams'>Teams</a>
                                            <a class="btn btn-sm btn-outline-success" type="button"   data-toggle="modal" data-target="#exampleModalCenter" title="">Edit</a>
                                            <form  id="sub-category-delete-form" method="post" style="display: inline-block">
                                                <a class="btn btn-sm btn-outline-danger" type="button" onclick="delete_confirmation({{$g->id}})" >Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

    <div class="modal bounceIn animated" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Group</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form id="group-form" action="{{ Route('tournaments.groups.store',$tournament = $tournament->id)}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input class="form-control" type="text" placeholder="Enter Group Name" name="group_name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('js')
    {{--    script for adding sub categories--}}
    <script>
        $('#group-form').on('submit',function(e){
            e.preventDefault();
            var number_of_rows = $("#group-table tr").length;
            $.ajax({
                    type : 'POST',
                    url : this.action,
                    data : $(this).serialize(),
                    success :function(data){
                        $("#exampleModalCenter").modal('hide');
                        $("#group-form").trigger('reset');
                        $.notify({
                                // title:'Title',
                                message:'Group Successfully Added!'
                            },
                            {
                                type:'success',
                                allow_dismiss:false,
                                newest_on_top:false ,
                                mouse_over:false,
                                showProgressbar:false,
                                spacing:10,
                                timer:500,
                                placement:{
                                    from:'top',
                                    align:'right'
                                },
                                offset:{
                                    x:30,
                                    y:60
                                },
                                delay:500,
                                z_index:10000,
                                animate:{
                                    enter:'animated fadeIn',
                                    exit:'animated fadeOut'
                                }
                            });
                        $("#group-table-body").append("<tr id="+ data.group.id +"><th scope='row'>"+ number_of_rows++ +" </th><td >"+ data.group.group_name +"</td><td><a class='btn btn-sm btn-outline-primary' href='/admin/groups/" + data.group.id+ "/teams'>Teams</a> <a class='btn btn-sm btn-outline-success' type='button'   data-toggle='modal' data-target='#exampleModalCenter' title'>Edit</a> <form  id='group-delete-form' method='post' style='display: inline-block'><a class='btn btn-sm btn-outline-danger' type='button' onclick='delete_confirmation("+ data.group.id +")'>Delete</a></form></td></tr>\n")
                    }
                }
            )
        });


        function delete_confirmation(group_id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                // icon: 'warning',
                showCancelButton: true,
                allowOutsideClick : false,
                cancelButtonColor: '#7366ff',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type : 'DELETE',
                        url : "/admin/groups/"+group_id,
                        data : {
                            "_token": "{{ csrf_token() }}",
                        },
                        success :function(data){
                            $('#' + group_id).fadeOut('slow', function(){
                                $('#' + group_id).remove();
                            });
                            $.notify({
                                    // title:'Title',
                                    message:'Group Successfully Deleted!'
                                },
                                {
                                    type:'success',
                                    allow_dismiss:false,
                                    newest_on_top:false ,
                                    mouse_over:false,
                                    showProgressbar:false,
                                    spacing:10,
                                    timer:500,
                                    placement:{
                                        from:'top',
                                        align:'right'
                                    },
                                    offset:{
                                        x:30,
                                        y:60
                                    },
                                    delay:500,
                                    z_index:10000,
                                    animate:{
                                        enter:'animated fadeIn',
                                        exit:'animated fadeOut'
                                    }
                                });
                            // location.reload();
                        }
                    });
                }
            });
        }

        function delete_function(group_id){
            $("#delete-modal").modal('show');
            $("#modal-cancel-button").on('click',function (){
                $("#delete-modal").modal('hide');
            });
            $("#modal-submit-button").on('click',function(e){
                $("#delete-modal").modal('hide');
                e.preventDefault();
                $.ajax({
                    type : 'DELETE',
                    url : "/admin/groups/"+group_id,
                    data : {
                        "_token": "{{ csrf_token() }}",
                    },
                    success :function(data){
                        $('#' + group_id).fadeOut('fast', function(){
                            $('#' + group_id).remove();
                        });
                        $.notify({
                                // title:'Title',
                                message:'Group Successfully Deleted!'
                            },
                            {
                                type:'success',
                                allow_dismiss:false,
                                newest_on_top:false ,
                                mouse_over:false,
                                showProgressbar:false,
                                spacing:10,
                                timer:500,
                                placement:{
                                    from:'top',
                                    align:'right'
                                },
                                offset:{
                                    x:30,
                                    y:60
                                },
                                delay:500,
                                z_index:10000,
                                animate:{
                                    enter:'animated fadeIn',
                                    exit:'animated fadeOut'
                                }
                            });
                        // location.reload();
                    }
                });
            });

        }

        $("#group-delete-form").on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type : 'POST',
                url : this.action,
                data : $(this).serialize(),
                success :function(data){
                    alert(data.group_id);
                    // $("#" + category_id).remove();
                }
            });
        });
    </script>
@endsection
