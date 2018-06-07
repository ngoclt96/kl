<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
        <a href="/" class="site_title"><i class="fa fa-paw"></i> <span> {{ config('app.name') }} </span></a>
    </div>
    <!-- /menu profile quick info -->
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>Dashboard</h3>
            <ul class="nav side-menu">
                <li><a><i class="fa fa-list"></i> Bookings Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('bookings.index') }}"> Bookings List</a></li>
                        <li><a href="{{ route('bookings.form') }}"> Bookings Register</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-list"></i> Courses Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('courses.index') }}"> Courses List</a></li>
                        <li><a href="{{ route('courses.form') }}"> Courses Register</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-list"></i> Teachers Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('teachers.index') }}"> Teachers List</a></li>
                        <li><a href="{{ route('teachers.form') }}"> Teachers Register</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-list"></i> Members Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('members.index') }}"> Members List</a></li>
                        <li><a href="{{ route('members.form') }}"> Members Register</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-list"></i> Lessons Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('lessons.index') }}"> Lesson List</a></li>
                        <li><a href="{{ route('lessons.form') }}"> Lesson Register</a></li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
    <!-- /sidebar menu -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a  onclick="event.preventDefault();   document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="top" title="" href="{{ route('login.logout') }}" data-original-title="Logout">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
</div>