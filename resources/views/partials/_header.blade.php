<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('@yield('header-image')')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                @if(Route::current()->getName() == 'single-post' || Route::current()->getName() == 'single-blog')
                    <div class="post-heading">
                        <h1>@yield('post-title')</h1>
                        <h2 class="subheading">@yield('post-subtitle')</h2>
                        <span class="meta">Posted by <a href="#">@yield('post-author')</a> on @yield('post-date')</span>
                    </div>
                @else
                    <div class="site-heading">
                        <h1>@yield('header-title')</h1>
                        <hr class="small">
                        <span class="subheading">@yield('header-subtitle')</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>