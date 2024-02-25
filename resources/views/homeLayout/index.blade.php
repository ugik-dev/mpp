<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home One || TownGov</title>
    @include('homeLayout.style')
</head>


<body>
    @include('homeLayout.header')

    @yield('content')

    @include('homeLayout.footer')
    <a href="#" class="scroll-to-top scroll-to-target" data-target="html"><i class="fa-solid fa-arrow-up"></i></a>

    <div id="pre-loader">
        <div id="loader-logo"></div><!-- loader-logo -->
        <div id="loader-circle"></div><!-- loader-circle -->
        <div class="loader-section section-left"></div><!-- loader-section -->
        <div class="loader-section section-right"></div><!-- loader-section -->
    </div><!-- pre-loader -->

    @include('homeLayout.script')
</body>

</html>
