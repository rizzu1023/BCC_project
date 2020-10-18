<div class="c-sidebar c-sidebar-lg-show c-sidebar-sm-hie" id="sidebar" style="background: #1a1a1a">
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-title">CRICIFY</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="/admin">
                <i class="c-sidebar-nav-icon cil-speedometer"></i> Dashboard
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="/admin/Tournament">
                <i class="c-sidebar-nav-icon cil-clipboard"></i> Tournaments
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="/admin/players">
                <i class="c-sidebar-nav-icon cil-user"></i> Players
            </a>
        </li>
{{--        <li class="c-sidebar-nav-item">--}}
{{--            <a href="{{route('BrowseResult')}}" class="c-sidebar-nav-link">--}}
{{--                <i class="c-sidebar-nav-icon cil-clipboard"></i> Results--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="c-sidebar-nav-item">
            <a href="{{route('logout')}}" class="c-sidebar-nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="c-sidebar-nav-icon cil-account-logout"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
        </li>
        {{--    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">--}}
        {{--      <a class="c-sidebar-nav-link nav-dropdown-toggle" href="#">--}}
        {{--        <i class="c-sidebar-nav-icon cil-puzzle"></i> Nav dropdown--}}
        {{--      </a>--}}
        {{--      <ul class="c-sidebar-nav-dropdown-items">--}}
        {{--        <li class="c-sidebar-nav-item">--}}
        {{--          <a class="c-sidebar-nav-link" href="#">--}}
        {{--            <i class="c-sidebar-nav-icon cil-puzzle"></i> Nav dropdown item--}}
        {{--          </a>--}}
        {{--        </li>--}}
        {{--        <li class="c-sidebar-nav-item">--}}
        {{--          <a class="c-sidebar-nav-link" href="#">--}}
        {{--            <i class="c-sidebar-nav-icon cil-puzzle"></i> Nav dropdown item--}}
        {{--          </a>--}}
        {{--        </li>--}}
        {{--      </ul>--}}
        {{--    </li>--}}
    </ul>

</div>
