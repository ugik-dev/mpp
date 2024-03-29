<!DOCTYPE html>
<html lang="en">

<head>
    @include('panel/layout/headerLayout')

    @yield('vendor-style')

</head>

<body class="bg-gradient-primary" id="page-top">
    <div id="wrapper">
        @include('panel/layout/fragment/menuFragment')
        <div id="content-wrapper" class="d-flex flex-column">
            @include('panel/layout/fragment/topNavbar')
            <div id="content">
                @yield('content')
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Mall Pelayanan Terpadu 2024</span>
                    </div>
                </div>
            </footer>

        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    @include('panel/layout/fragment/modalLogout')
    @include('panel/layout/footerLayout')

    @yield('vendor-script')
    @stack('pricing-script')
    @stack('scripts')
</body>

</html>
