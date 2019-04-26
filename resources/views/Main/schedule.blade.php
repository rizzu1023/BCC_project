@extends('Main.layouts.base')


@section('content')


<div class="schedule-area laptop">
  <div class="container">
      <table class="table table-striped table-responsive-xs table-xs">
          <thead>
            <tr>
              <th scope="col">Match</th>
              <th scope="col">Team</th>
              <th scope="col">vs</th>
              <th scope="col">Team</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
            </tr>
          </thead>

          <tbody>
        
             <tr>
              <th scope="row">2</th>
              <th>MI</th>
              <td>vs</td>
              <th>CSK</th>
              <td>26-Apr-2019</td>
              <td>8:00 PM</td>
            </tr>
          
          </tbody>
        </table>
  </div>
</div>

  <div class="schedule-area mobile">
    <div class="container-fluid p-0">
        <table class="table table-striped table-responsive-xs table-xs">
            <thead>
              <tr>
                <th scope="col">M</th>
                <th scope="col">T</th>
                <th scope="col">vs</th>
                <th scope="col">T</th>
                <th scope="col">D</th>
                <th scope="col">T</th>
              </tr>
            </thead>

            <tbody>
          
            <tr>
              <th scope="row">2</th>
              <th>MI</th>
              <td>vs</td>
              <th>CSK</th>
              <td>26-Apr-2019</td>
              <td>8:00 PM</td>
            </tr>
          
            </tbody>
          </table>
    </div>
  </div>

@endsection