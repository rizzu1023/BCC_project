<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{--        <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui@3.0.0-rc.0/dist/css/coreui.min.css">--}}
    {{--    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        @font-face {
            /*font-family : Averta;*/
        {{--            src : url({{ asset('assets/Main/fonts/AvertaDemoPE-ExtraboldItalic.woff2') }});--}}

        }

        html body {
            font-family: 'Open Sans', sans-serif;
        }

        .c-header {
            background: #1a1a1a;
            color: #fff;
            border: 0;
            width: 100vw;
        }

        .c-header-text {
            /*text-align: center;*/
            width: 100%;
            line-height: 56px;
            padding: 0 12px;
        }

        .c-header-text #back_button {
            float: left;
        }

        .c-header-text #back_button img {
            height: 35px;
            width: 35px;
        }

        .c-header-text #menu_button {
            float: right;
        }

        .c-header-text #menu_button img {
            height: 28px;
            width: 28px;
        }

        .c-header-text span {
            color: #fff;
            position: absolute;
            font-size: 1.1rem;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
    @yield('css')

    <title>Cricket</title>
</head>
<body class="c-app">
<div id="app">

    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="c-sidebar-brand d-lg-down-none">
            <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="assets/brand/coreui.svg#full"></use>
            </svg>
            <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="assets/brand/coreui.svg#signet"></use>
            </svg>
        </div>


        <ul class="c-sidebar-nav">
            {{--            <li class="c-sidebar-nav-item">--}}
            {{--                <router-link class="nav-link" to="/">--}}
            {{--                    <i class="nav-icon icon-pencil"></i> Dashboard--}}
            {{--                </router-link>--}}
            {{--            </li>--}}
            {{--            <li class="c-sidebar-nav-item">--}}
            {{--                <router-link class="nav-link" to="/tournament">--}}
            {{--                    <i class="nav-icon icon-pencil"></i> Tournament--}}
            {{--                </router-link>--}}
            {{--            </li>--}}
            {{--            <li class="c-sidebar-nav-item">--}}
            {{--                <router-link class="nav-link" to="/team">--}}
            {{--                    <i class="nav-icon icon-pencil"></i> Teams--}}
            {{--                </router-link>--}}
            {{--            </li>--}}
            {{--            <li class="c-sidebar-nav-item">--}}
            {{--                <router-link class="nav-link" to="/livescore">--}}
            {{--                    <i class="nav-icon icon-drop"></i> LiveScores--}}
            {{--                </router-link>--}}
            {{--            </li>--}}
            {{--            <li class="c-sidebar-nav-item">--}}
            {{--                <router-link class="nav-link" to="/player">--}}
            {{--                    <i class="nav-icon icon-pencil"></i> Players--}}
            {{--                </router-link>--}}
            {{--            </li>--}}

        </ul>


    </div>
    <div class="c-wrapper c-fixed-components">
        <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
            <div class="c-header-text">
                <a v-on:click="clicked()" id="back_button"><img
                        src="{{ asset('assets/Main/icons/back_icon.png') }}"></a>
                <span v-text="$header_string"></span>
                <a id="menu_button"><img src="{{ asset('assets/Main/icons/menu_icon.png') }}"></a>

                {{--                <a >Back</a>--}}
            </div>
            {{--            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"--}}
            {{--                    data-class="c-sidebar-show">--}}
            {{--                <svg class="c-icon c-icon-lg">--}}
            {{--                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-menu"></use>--}}
            {{--                </svg>--}}
            {{--            </button>--}}
            {{--            <div class="c-header-bran top-header">--}}
            {{--            </div>--}}
            {{--            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"--}}
            {{--                    data-class="c-sidebar-lg-show" responsive="true">--}}
            {{--                <svg class="c-icon c-icon-lg">--}}
            {{--                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-menu"></use>--}}
            {{--                </svg>--}}
            {{--            </button>--}}
            {{--            <ul class="c-header-nav d-md-down-none">--}}
            {{--                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Dashboard</a></li>--}}
            {{--                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Users</a></li>--}}
            {{--                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Settings</a></li>--}}
            {{--            </ul>--}}
            {{--            <ul class="c-header-nav ml-auto mr-4">--}}
            {{--                <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">--}}
            {{--                        <svg class="c-icon">--}}
            {{--                            <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bell"></use>--}}
            {{--                        </svg>--}}
            {{--                    </a></li>--}}
            {{--                <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">--}}
            {{--                        <svg class="c-icon">--}}
            {{--                            <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-list-rich"></use>--}}
            {{--                        </svg>--}}
            {{--                    </a></li>--}}
            {{--                <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">--}}
            {{--                        <svg class="c-icon">--}}
            {{--                            <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-envelope-open"></use>--}}
            {{--                        </svg>--}}
            {{--                    </a></li>--}}
            {{--                <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#"--}}
            {{--                                                          role="button" aria-haspopup="true" aria-expanded="false">--}}
            {{--                        <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/6.jpg" alt="user">--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                    <div class="dropdown-menu dropdown-menu-right pt-0">--}}
            {{--                        <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>--}}
            {{--                        <a class="dropdown-item" href="#">--}}
            {{--                            <svg class="c-icon mr-2">--}}
            {{--                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bell"></use>--}}
            {{--                            </svg>--}}
            {{--                            Updates<span class="badge badge-info ml-auto">42</span></a><a class="dropdown-item"--}}
            {{--                                                                                          href="#">--}}
            {{--                            <svg class="c-icon mr-2">--}}
            {{--                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-envelope-open"></use>--}}
            {{--                            </svg>--}}
            {{--                            Messages<span class="badge badge-success ml-auto">42</span></a><a class="dropdown-item"--}}
            {{--                                                                                              href="#">--}}
            {{--                            <svg class="c-icon mr-2">--}}
            {{--                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-task"></use>--}}
            {{--                            </svg>--}}
            {{--                            Tasks<span class="badge badge-danger ml-auto">42</span></a><a class="dropdown-item"--}}
            {{--                                                                                          href="#">--}}
            {{--                            <svg class="c-icon mr-2">--}}
            {{--                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-comment-square"></use>--}}
            {{--                            </svg>--}}
            {{--                            Comments<span class="badge badge-warning ml-auto">42</span></a>--}}
            {{--                        <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>--}}
            {{--                        <a class="dropdown-item" href="#">--}}
            {{--                            <svg class="c-icon mr-2">--}}
            {{--                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-user"></use>--}}
            {{--                            </svg>--}}
            {{--                            Profile</a><a class="dropdown-item" href="#">--}}
            {{--                            <svg class="c-icon mr-2">--}}
            {{--                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-settings"></use>--}}
            {{--                            </svg>--}}
            {{--                            Settings</a><a class="dropdown-item" href="#">--}}
            {{--                            <svg class="c-icon mr-2">--}}
            {{--                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-credit-card"></use>--}}
            {{--                            </svg>--}}
            {{--                            Payments<span class="badge badge-secondary ml-auto">42</span></a><a class="dropdown-item"--}}
            {{--                                                                                                href="#">--}}
            {{--                            <svg class="c-icon mr-2">--}}
            {{--                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-file"></use>--}}
            {{--                            </svg>--}}
            {{--                            Projects<span class="badge badge-primary ml-auto">42</span></a>--}}
            {{--                        <div class="dropdown-divider"></div>--}}
            {{--                        <a class="dropdown-item" href="#">--}}
            {{--                            <svg class="c-icon mr-2">--}}
            {{--                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-lock-locked"></use>--}}
            {{--                            </svg>--}}
            {{--                            Lock Account</a><a class="dropdown-item" href="#">--}}
            {{--                            <svg class="c-icon mr-2">--}}
            {{--                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-account-logout"></use>--}}
            {{--                            </svg>--}}
            {{--                            Logout</a>--}}
            {{--                    </div>--}}
            {{--                </li>--}}
            {{--            </ul>--}}

        </header>
        <div class="c-body">
            <main class="c-main p-0">
                <div class="">
                    <div class="fade-in">
                        <router-view></router-view>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- Popper.js first, then CoreUI JS -->
<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"
        integrity="sha384-L2pyEeut/H3mtgCBaUNw7KWzp5n9&#43;4pDQiExs933/5QfaTh8YStYFFkOzSoXjlTb"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/@coreui/coreui@3.0.0-rc.0/dist/js/coreui.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.js"></script>

<script>

    // alert(colors.black);
</script>
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>


</body>
</html>
