<section class="main-slider">
    <div class="main-slider-swiper owl-carousel owl-theme">
        @foreach ($heroes as $hero)
            <div class="item">
                <div class="item-slider-bg"
                    style="background-image: url({{ $hero->image ? url('/upload/hero/' . $hero->image) : url('assets/background/bg-' . str_pad(rand(1, 23), 2, '0', STR_PAD_LEFT) . '.jpg') }});background-repeat:no-repeat !important;
                    background-position: center center !important;">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider-content">
                                <div class="slider-tagline">{{ $hero->text_1 }}</div>
                                <h3 class="section-title">{!! $hero->text_2 !!}</h3>
                                @if ($hero->button == 'Y')
                                    @php
                                        if ($hero->button == 'Y') {
                                            if ($hero->button_type == 'content') {
                                                $link = url('content/' . $hero->key);
                                            } elseif ($hero->button_type == 'link') {
                                                $link = $hero->link;
                                            } else {
                                                $link = '#';
                                            }
                                        } else {
                                            $link = '#';
                                        }
                                    @endphp
                                    <a href="{{ $link }}"
                                        class="btn btn-primary">{{ !empty($hero->button_text) ? $hero->button_text : 'Klik disini!' }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
