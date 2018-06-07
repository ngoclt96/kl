<style>
    .header {
        top: 0;
        width: 100%;
        height: 60px;
    }
</style>
<header class="header d-flex flex-row">
    <div class="header_content d-flex flex-row align-items-center">
        <!-- Logo -->
        <div class="logo_container">
            <div class="logo">
            <b style="margin-right: 20px; color: #b22;"> {{ request()->session()->get('member_name') }}</b>   <img src="images/logo.png" alt="">
                <span>course</span>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="main_nav_container">
            <div class="main_nav">
                <ul class="main_nav_list">
                    <li class="main_nav_item"><a href="/">home</a></li>
                    <li class="main_nav_item"><a href="/introduce">about us</a></li>
                    <li class="main_nav_item"><a href="/course">courses</a></li>
                    <li class="main_nav_item"><a href="elements.html">elements</a></li>
                    <li class="main_nav_item"><a href="news.html">news</a></li>
                    <li class="main_nav_item"><a href="contact.html">contact</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="header_side d-flex flex-row justify-content-center align-items-center">
        <nav class="-desktop main-navigation public-navigation" role="home-navigation">
        <ul class="nav-menu inline-list">
                <a href="/register">Sign up</a>
                <a href="/login" style="margin-left: 10px; margin-right: 10px;">Login</a>
                <a href="/logout"
                   onclick="event.preventDefault();   document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out pull-right"></i>Logout
                </a>

                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
        </ul>
        </nav>
    </div>


    <!-- Hamburger -->
    <div class="hamburger_container">
        <i class="fas fa-bars trans_200"></i>
    </div>

</header>