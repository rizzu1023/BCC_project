@extends('Admin.layouts.base')

@section('content')


<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Dashboard</h3> 

				<div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{$teams}}</strong></h5>
                      <span>Teams</span>
                    </div>
                </div>
        	</div> 
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{$players}}</strong></h5>
                      <span>Players</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-money user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{$tournaments}}</strong></h5>
                      <span>Tournaments</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{$matches}}</strong></h5>
                      <span>Matches</span>
                    </div>
                </div>
        	 </div>
		</div>
					
			</div>
</div>

@endsection