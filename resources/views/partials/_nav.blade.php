<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/">Your Blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="/">Home</a>
                </li>
                @if(Auth::check())
                    <li class="{{ Request::is('post/create') ? 'active' : '' }}">
                        <a href="/post/create">Post</a>
                    </li>
                @endif
                <li class="{{ Request::is('blog') ? 'active' : '' }}">
                    <a href="/blog">Blog</a>
                </li>
                <li class="{{ Request::is('about') ? 'active' : '' }}">
                    <a href="/about">About</a>
                </li>
                <li class="{{ Request::is('contact') ? 'active' : '' }}">
                    <a href="/contact">Contact</a>
                </li>
                @if(!Auth::check())
                    <li class="{{ Request::is('auth/login') ? 'active' : '' }}"><a href="/auth/login" class="signin">Sign in</a></li>
                    <li class="{{ Request::is('auth/register') ? 'active' : '' }}"><a href="/auth/register" class="signup">Sign up</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/auth/logout">Log out</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>