<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
    <div class="logo-wrapper" style="box-shadow: none"><a href="/admin/"><img class="img-fluid"
                                                                                       src="{{asset('Assets/Admin/images/feimages/FELogo.png')}}"
                                                                                       alt=""></a></div>
    <div class="logo-icon-wrapper"><a href="/admin/dashboard"><img class="img-fluid"
                                                                   src="{{asset('Assets/Admin/images/feimages/FELogo.png')}}"
                                                                   alt=""></a></div>
    <nav>
        <div class="sidebar-main">
            <div id="sidebar-menu">
                <ul class="sidebar-links custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-right"><span>Back</span><i
                                class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list"><a class="nav-link " href="/admin/dashboard">
                            <i data-feather="home"></i><span>Dashboard</span></a></li>
                    <li class="sidebar-list">
                        <a class="nav-link  " href="/admin/Tournament"><i data-feather="truck"></i><span>Tournaments</span></a>
                    </li>
                    <li class="sidebar-list">
                        <a class="nav-link  " href="/admin/players"><i data-feather="users"></i><span>Players</span></a>
                    </li>
                    <li class="sidebar-list">
                        <a class="nav-link  " href="/admin/teams"><i data-feather="users"></i><span>Teams</span></a>
                    </li>




                    <li class="sidebar-list">
                        <a class="nav-link"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout' ) }}"><i data-feather="log-out"></i><span>Log out</span></>
                        <form method="POST"  id="logout-form" action="{{ Route('logout') }}" >
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- Page Sidebar Ends-->



