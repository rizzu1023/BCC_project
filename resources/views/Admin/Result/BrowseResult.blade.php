@extends('Admin.layouts.base')


@section('content')

<div id="page-wrapper">
			<div class="main-page">

				<h3 class="title1">Results</h3>
                <form method="POST" action="{{route('Post_BrowseResult')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Select Match</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="match_no">
                        <!-- <option value=""></option> -->
                        @for($i=0 ; $i<count($result); $i=$i+2)
                            <option value="{{$result[$i]->match_no}}">Match {{$result[$i]->match_no}}.  {{$result[$i]->Teams->team_name}} vs {{$result[$i+1]->Teams->team_name}}</option>
                        @endfor
                    </select>
				</div>
                <input type="hidden" value="BCC2019" name="tournament"/>
				<button type="submit" class="btn btn-default">Browse</button>

                </form>


			</div>
</div>

@endsection
