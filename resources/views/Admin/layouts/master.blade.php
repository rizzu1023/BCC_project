<!DOCTYPE html>

<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Admin</title>
</head>

<link href="{{ asset('css/style.css')}}" rel="stylesheet">






<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="img/brand/logo.svg" width="89" height="25" alt="Admin">
        <img class="navbar-brand-minimized" src="img/brand/sygnet.svg" width="30" height="30" alt="Admin">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Dashboard</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Users</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Settings</a>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="img/avatars/6.jpg" alt="profile">
            </a>

        </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

</header>
<div id="app">
<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <router-link class="nav-link" to="/">
                        <i class="nav-icon icon-speedometer"></i> Dashboards
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/livescore">
                        <i class="nav-icon icon-drop"></i> LiveScores
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/team">
                        <i class="nav-icon icon-pencil"></i> Teams</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/player">
                        <i class="nav-icon icon-pencil"></i> Players</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/batting">
                        <i class="nav-icon icon-pencil"></i> Batting </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/bowling">
                        <i class="nav-icon icon-pencil"></i> Bowling</router-link>
                </li>


            </ul>
        </nav>

    </div>
    <main class="main">
        <div class="container">
            <div class="animated fadeIn">
                    <router-view></router-view>
                </div>
            </div>
    </main>
</div>
</div>


<script src="{{asset('js/app.js')}}"></script>
</body>

</html>
