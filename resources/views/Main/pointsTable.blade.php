@extends('Main.layouts.base')


@section('content')


<div class="pointsTable-area laptop">
    <div class="container">
        <table class="table table-striped ">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Team</th>
                <th scope="col">Match</th>
                <th scope="col">Won</th>
                <th scope="col">Lost</th>
                <th scope="col">Draw</th>
                <th scope="col">Pts</th>
                <th scope="col">NRR</th>
              </tr>
            </thead>
 
            <tbody>

              <tr>
                <th scope="row">1</th>
                <th>MI</th>
                <td>10</td>
                <td>6</td>
                <td>4</td>
                <td>0</td>
                <td>12</td>
                <td>0.84</td>
              </tr>
             
            </tbody>
          </table>
    </div>
  </div>

 <div class="pointsTable-area mobile">
    <div class="container-fluid p-0">
        <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">P</th>
                <th scope="col">Team</th>
                <th scope="col">M</th>
                <th scope="col">W</th>
                <th scope="col">L</th>
                <th scope="col">D</th>
                <th scope="col">Pts</th>
                <th scope="col">NRR</th>
              </tr>
            </thead>

            <tbody>

              <tr>
                <th scope="row">1</th>
                <th>MI</th>
                <td>10</td>
                <td>6</td>
                <td>4</td>
                <td>0</td>
                <td>12</td>
                <td>0.84</td>
              </tr>
             
            </tbody>
          </table>
    </div>
  </div>

@endsection