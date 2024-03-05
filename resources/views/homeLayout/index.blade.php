@php
    $profile = profile();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MPP Bangka</title>
    @include('homeLayout.style')
    @yield('style')

</head>


<body>
    <div id="pre-loader">
        <div id="loader-logo">
            <img src="{{ url('assets/image/kab-bangka.png') }}">
        </div>
        <!-- loader-logo -->
        <div id="loader-circle">
        </div>
        <!-- loader-circle -->
        <div class="loader-section section-left"></div>
        <!-- loader-section -->
        <div class="loader-section section-right"></div>
        <!-- loader-section -->
    </div>

    @include('homeLayout.header')
    {{-- @include('homeLayout.header_mega') --}}

    @yield('content')

    @include('homeLayout.footer')
    <a href="#" class="scroll-to-top scroll-to-target" data-target="html"><i class="fa-solid fa-arrow-up"></i></a>

    @include('homeLayout.script')
    @yield('script')

</body>

</html>
