<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._head')
</head>

<body>

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

