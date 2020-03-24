<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> Admin</a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="/admin">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              <li class="treeview">
                <a href="{{route('Tournament.index')}}">
                <i class="fa fa-users"></i>
                <span>Tournament</span>
                </a>
              </li>
              <li class="treeview">
                <a href="{{route('Team.index')}}">
                <i class="fa fa-users"></i>
                <span>Teams</span>
                </a>
              </li>
              <li class="treeview">
                <a href="/admin/5/Player">
                <i class="fa fa-user"></i>
                <span>Players</span>
                </a>
              </li>
              <li class="treeview">
                <a href="{{route('Schedule.index')}}">
                <i class="fa fa-calendar"></i>
                <span>Schedule</span>
                </a>
              </li>
              <li class="treeview">
                <a href="{{route('LiveScore.index')}}">
                <i class="fa fa-calendar"></i>
                <span>Live Score</span>
                </a>
              </li>
              <li class="treeview">
                <a href="{{route('Batting.index')}}">
                <i class="fa fa-pie-chart"></i>
                <span>Batting</span>
                </a>
              </li>
              <li class="treeview">
                <a href="{{route('Bowling.index')}}">
                <i class="fa fa-pie-chart"></i>
                <span>Bowling</span>
                </a>
              </li>
              <li class="treeview">
                <a href="{{route('PointsTable.index')}}">
                <i class="fa fa-bars"></i>
                <span>Points Table</span>
                </a>
              </li>

              <li class="treeview">
                <a href="{{route('BrowseResult')}}">
                <i class="fa fa-bars"></i>
                <span>Results</span>
                </a>
              </li>

            </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>
