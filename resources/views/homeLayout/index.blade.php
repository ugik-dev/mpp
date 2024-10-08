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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}?v=0.1">

</head>


<body>
    <div id="pre-loader">
        <div id="loader-logo">
            <img src="{{ url('assets/image/kab-bangka.png') }}">
        </div>
        <div id="loader-circle">
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
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
