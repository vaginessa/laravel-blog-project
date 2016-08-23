<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._head')
</head>

<body>

<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '893929677407154',
            xfbml      : true,
            version    : 'v2.7'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

@include('partials._nav')

        <!-- Page Header -->
@include('partials._header')

@yield('post-header')

        <!-- Main Content -->
<div class="container">

    @include('partials._messages')

    @yield('content')

</div>

<hr>


<!-- Footer -->
<footer>

    <div class="container">
        @include('partials._footer')

    </div>
</footer>

@include('partials._javascript')

@yield('scripts')
</body>

</html>

