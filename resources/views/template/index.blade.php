<!doctype html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <title>ADMAG | Responsive Blog & Magazine HTML Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="ADMAG — Responsive Blog & Magazine HTML Template">
    <meta name="author" content="digitaltheme.co">
    <meta class="viewport" name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('template.style')
</head>

<body>
    <div id="main" class="header-big">

        @include('template.header')
        @yield('content')
        @include('template.footer')
    </div>
    @include('template.nav_mobile')
    <div id="go-top-button" class="fa fa-angle-up" title="Scroll To Top"></div>
    <div class="mobile-overlay" id="mobile-overlay"></div>
    <div class="customizer">
        <div id="customizer-button" class="customizer-button">
            <i class="fa fa-cog"></i>
        </div>
        <div class="customizer-content clearfix">
            <div class="customizer-item clearfix">
                <h5>Layout Style</h5>
                <ul>
                    <li class="active" data-class="boxed"><span>Boxed</span></li>
                    <li data-class="wide"><span>Wide</span></li>
                </ul>
            </div>
            <div class="customizer-item clearfix">
                <h5>Template Style</h5>
                <ul>
                    <li class="active" data-class="light"><span>Light</span></li>
                    <li data-class="dark-skin"><span>Dark</span></li>
                </ul>
            </div>
            <div class="customizer-item clearfix">
                <h5>Sticky Header</h5>
                <ul>
                    <li class="active" data-class="fixed-header"><span>Enable</span></li>
                    <li data-class="relative-header"><span>Disable</span></li>
                </ul>
            </div>
            <div class="customizer-item clearfix customizer-colors">
                <h5>Template Color</h5>
                <ul>
                    <li class="template-color1 active" data-class="body-color1"><span></span></li>
                    <li class="template-color2" data-class="body-color2"><span></span></li>
                    <li class="template-color3" data-class="body-color3"><span></span></li>
                    <li class="template-color4" data-class="body-color4"><span></span></li>
                    <li class="template-color5" data-class="body-color5"><span></span></li>
                    <li class="template-color6" data-class="body-color6"><span></span></li>
                </ul>
            </div>
            <div class="customizer-item clearfix customizer-colors customizer-bg">
                <h5>Background Images</h5>
                <ul>
                    <li class="no-background" data-class="no-background" class="active"><span></span></li>
                    <li class="background-image1" data-class="background-image1"><span></span></li>
                    <li class="background-image2" data-class="background-image2"><span></span></li>
                    <li class="background-image3" data-class="background-image3"><span></span></li>
                    <li class="background-image4" data-class="background-image4"><span></span></li>
                </ul>
            </div>
            <div class="customizer-item clearfix">
                <a href="http://themeforest.net/item/admag-responsive-blog-magazine-html-template/11147481?ref=digitaltheme"
                    class="btn btn-default btn-purchase">
                    Purchase
                </a>
            </div>

        </div>

    </div>
    @include('template.script')

</body>

</html>
