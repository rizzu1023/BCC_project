@extends('Admin.layouts.base')

@section('css')
    <style>
        .single-name{
            display:inline-block;
            margin-left:10px;
            padding: 5px 0;
            font-size: 20px;
            /* background:orange; */
        }

        .single-div{
            background:#fff;
            border-right:1px solid gray;
        }
    </style>
@endsection
@section('content')

<div id="page-wrapper">
			<div class="main-page">
            <form method="POST" action="{{route('StartScore')}}">
            @csrf
                @php 
                 $str = "t1p";
                 $i = 1
                @endphp
             <div class="col-md-6 single-div">
                <h3 class="title1">{{$teams->Teams1->team_name}} XI</h3>
                    @foreach($players1 as $p1)
                        <input class="single-checkbox" type="checkbox" name="{{$str.$i}}" value="{{$p1->player_id}}"><div class="single-name">{{$loop->index + 1}} {{$p1->player_name}}</div><br>
                    @php($i++)
                    @endforeach
                </div>

                <div class="col-md-6 single-div">
                <h3 class="title1">{{$teams->Teams2->team_name}} XI</h3>
                    
                    @foreach($players2 as $p2)
                        <input class="single-checkbox" type="checkbox" name="{{$str.$i}}" value="{{$p2->player_id}}"><div class="single-name">{{$loop->index + 1}} {{$p2->player_name}}</div><br>
                    @php($i++)
                    @endforeach
                </div>


            <button type="submit" class="btn btn-default">Start</button> 


            </form>
            </div>
            
</div>

@endsection

@section('script')
    <script src="{{asset('assets/Admin/js/checkbox.js')}}"></script>
@endsection