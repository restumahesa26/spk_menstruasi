<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('title')
    </title>
    @include('includes.style')
    @stack('addon-style')
</head>

<body class="">
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            @include('includes.navbar-mobile')
            @include('includes.sidebar')
        </div>
    </nav>
    <div class="main-content">
        @include('includes.navbar')
        @yield('content')
    </div>
    @include('includes.script')
    @stack('addon-script')
</body>

</html>
