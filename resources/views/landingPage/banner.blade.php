<section class="main-slider">
    <div class="container">
        <div class="row">
            @foreach ($banners as $i => $banner)
                @php
                    $animationClass = '';
                    if ($i % 3 == 0) {
                        $animationClass = 'animate__backInLeft  animate__delay-1s';
                    } elseif ($i % 3 == 1) {
                        $animationClass = 'animate__backInDown animate__delay-3s';
                    } else {
                        $animationClass = 'animate__backInRight animate__delay-2s';
                    }
                @endphp
                <div class="col-lg-4 wow animate__animated  {{ $animationClass }} banner-button">
                    <div class="image-banner"
                        style="{{ $banner->bg_color ? 'background-color: ' . $banner->bg_color . ';  border: 1px solid #CCC;' : '' }}">
                        <a class ="" href="{{ $banner->link }}" alt="{{ $banner->name }}" style="margin: auto">
                            <img src="{{ $banner->image ? url('upload/images/' . $banner->image) : url('assets/image/shapes/client-1.png') }}"
                                class="img-fluid" title="{{ $banner->name }}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
