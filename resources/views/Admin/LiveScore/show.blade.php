@extends('Admin.layouts.base')

@section('topbar_link')
    <a href="/admin/LiveScoreCard/{{$matchs->match_id}}/{{$matchs->tournament}}" class="btn btn-primary"
       style="margin-top:10px ">Scorecard</a>
@endsection

@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <style>
        .tables {
            margin-top: 20px;
        }

        .ftable {
            margin-top: 20px;
        }

        .toss {
            margin: 10px 0;
            padding: 10px 0;
            border: 1px solid gray;
        }

        .team-name {
            /* background: lightgray; */
            padding: 20px 10px;
        }

        .team-name h3 {
            display: inline-block;
            margin-top: 10px;
        }

        .team-name span {
            /* float:right; */
            /* background:lightblue; */
            padding: 10px;
            /* margin-right:100px; */
        }

        .bt {
            width: 50px;
            height: 50px;
            border: none;
            background: lightgray;
        }

    </style>
@endsection

@section('content')
    @php
        if($matchs->MatchDetail['0']->isBatting){
            $batting = $matchs->MatchDetail['0']->team_id;
            $bowling = $matchs->MatchDetail['1']->team_id;

            $isOver = $matchs->MatchDetail['0']->isOver;
            $isWicket = $matchs->MatchDetail['0']->isWicket;
        }
        else{
            $batting = $matchs->MatchDetail['1']->team_id;
            $bowling = $matchs->MatchDetail['0']->team_id;

            $isOver = $matchs->MatchDetail['1']->isOver;
            $isWicket = $matchs->MatchDetail['1']->isWicket;
        }

        $opening = true;
        foreach($matchs->MatchPlayers as $mp){
          if($mp->team_id == $batting)
            if($mp->bt_status == 10 || $mp->bt_status == 11)
              $opening = false;
        }
    @endphp
    <div id="app">
        <Accordion></Accordion>
    </div>
    <!-- </div> -->

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var opening = {!! str_replace("'", "\'", json_encode($opening)) !!};
            var isOver = {!! str_replace("'", "\'", json_encode($isOver)) !!};
            var isWicket = {!! str_replace("'", "\'", json_encode($isWicket)) !!};
            if (opening)
                $("#openingModal").modal('show');

            if (isOver) {
                $("#overModal").modal('show');
            }

            if (isWicket) {
                $("#wicketModal").modal('show');

                $('#div_wicket_primary').hide();
                $('#div_wicket_secondary').hide();

                $('#wicket_type').on('change', function () {
                    var wicket_type = $("#wicket_type").val();
                    if (wicket_type === 'catch') {
                        $('#wicket_secondary').prop('disabled', false);
                        $('#wicket_secondary').prop('required', true);
                        $('#label_wicket_secondary').html('Catch By');
                        $('#label_wicket_primary').html('Bowl By');
                        $('#div_wicket_primary').show();
                        $('#div_wicket_primary_runout').hide();
                        $('#div_wicket_secondary').show();
                        $('#div_batsman_cross').show();

                    }
                    if (wicket_type === 'stump') {
                        $('#wicket_secondary').prop('disabled', false);
                        $('#wicket_secondary').prop('required', true);
                        $('#label_wicket_secondary').html('Stumped By');
                        $('#label_wicket_primary').html('Bowl By');
                        $('#div_wicket_primary_runout').hide();
                        $('#div_wicket_primary').show();
                        $('#div_wicket_secondary').show();

                    }
                    if (wicket_type === 'runout') {
                        $('#wicket_secondary').prop('disabled', false);
                        $('#wicket_secondary').prop('required', false);
                        $('#label_wicket_secondary').html('Run out By(Optional)');
                        $('#div_wicket_primary').hide();
                        $('#div_wicket_primary_runout').show();
                        $('#div_wicket_secondary').show();
                    }
                    if (wicket_type === 'hitwicket') {
                        $('#wicket_secondary').prop('disabled', true);
                        $('#label_wicket_primary').html('Bowl By');
                        $('#div_wicket_secondary').hide();
                        $('#div_wicket_primary_runout').hide();
                        $('#div_wicket_primary').show();

                    }
                    if (wicket_type === 'bold') {
                        $('#wicket_secondary').prop('disabled', true);
                        $('#label_wicket_primary').html('Bowled By');
                        $('#div_wicket_secondary').hide();
                        $('#div_wicket_primary_runout').hide();
                        $('#div_wicket_primary').show();


                    }
                    if (wicket_type === 'lbw') {
                        $('#wicket_secondary').prop('disabled', true);
                        $('#label_wicket_primary').html('Bowl By');
                        $('#div_wicket_primary_runout').hide();
                        $('#div_wicket_primary').show();
                        $('#div_wicket_secondary').hide();
                    }
                });

            }
        });
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#bowlerForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: '{{Route('LiveUpdate')}}',
                data: $(this).serialize(),
                success: function (data) {
                    $('#overModal').modal('hide');
                    //  alert(data.message);
                    location.reload();
                }
            });
        });

        // for wicket
        $('#newBatsmanForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: '{{Route('LiveUpdate')}}',
                data: $(this).serialize(),
                success: function (data) {
                    $('#wicketModal').modal('hide');
                    //  alert(data.message);
                    location.reload();
                }
            });
        });

        //for opening batsman selection
        $('#modal').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: '{{Route('LiveUpdate')}}',
                data: $(this).serialize(),
                success: function (data) {
                    $('#bowlerModal').modal('hide');
                    //  alert(data.message);
                    location.reload();
                }
            });
        });


        //for live update
        $(".bt").on('click', function (e) {
            e.preventDefault();
            var bt_team_id = "{{$batting}}";
            var bw_team_id = "{{$bowling}}";
            var match_id = $("input[name=match_id]").val();
            var tournament = $("input[name=tournament]").val();
            var attacker_id = $("input[name=attacker_id]").val();
            var player_id = $("input[name=player_id]:checked").val();
            var value = $(this).val();

            $.ajax({
                type: "POST",
                url: "{{route('LiveUpdate')}}",
                // headers: {'X-Requested-With': 'XMLHttpRequest'},
                data: {
                    player_id: player_id,
                    attacker_id: attacker_id,
                    bt_team_id: bt_team_id,
                    bw_team_id: bw_team_id,
                    match_id: match_id,
                    tournament: tournament,
                    value: value
                },
                success: function (data) {
                    // alert(data.userjobs);
                    location.reload(true);
                }
            });
        });


    </script>



@endsection
