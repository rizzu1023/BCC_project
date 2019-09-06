<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cricket</title>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/Main/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/Main/css/main.css')}}" >
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
</head>
<body>
  <header class="site-header">
  <nav class="navbar navbar-expand-md navbar-dark bg-steel fixed-top">
    <div class="container">
      <a class="navbar-brand mr-4" href="#">BCC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggle">
        <div class="navbar-nav mr-auto">
          <a class="nav-item nav-link" href="/">Home</a>
          <a class="nav-item nav-link" href="/pointsTable">Points table</a>
          <a class="nav-item nav-link" href="/teams">Teams</a>
          <a class="nav-item nav-link" href="/schedule">Schedule</a>
          <a class="nav-item nav-link" href="/stats">Stats</a>

        </div>
        <!-- Navbar Right Side -->
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="#">Profile</a>
          <a class="nav-item nav-link" href="#">Logout</a>
        </div>
      </div>
    </div>
</nav>
</header>
      <main>
             @yield('content')
      </main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
