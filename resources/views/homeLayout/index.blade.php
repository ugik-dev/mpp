<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home One || TownGov</title>
    @include('homeLayout.style')
    @yield('style')

</head>


<body>
    @include('homeLayout.header')
    {{-- @include('homeLayout.header_mega') --}}

    @yield('content')

    @include('homeLayout.footer')
    <a href="#" class="scroll-to-top scroll-to-target" data-target="html"><i class="fa-solid fa-arrow-up"></i></a>

    {{-- <div id="pre-loader">
        <div id="loader-logo"></div>
        <div id="loader-circle"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> --}}

    @include('homeLayout.script')
    @yield('script')

</body>

</html>
