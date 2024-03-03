<section class="blog-section">
    <div class="container">
        <div class="blog-box">
            <div class="section-title-box text-center">
                <div class="section-tagline">Terbaru</div>
                <h2 class="section-title"> Berita dan Arikel</h2>
            </div><!-- section-title-box -->
        </div><!--blog-box-->
        <div class="row row-gutter-y-155">
            @foreach ($sidbar_lates_content as $lp)
                @php
                    $url = route('blog', [$lp->prefix, $lp->slug]);
                @endphp
                <div class="col-lg-4">
                    <div class="blog-card">
                        <div class="blog-card-image">
                            @if ($lp->sampul)
                                <img src="{{ url('storage/upload/content/' . $lp->sampul) }}" class="img-fluid"
                                    alt="img-22">
                            @else
                                <img src="assets/background/bg-{{ str_pad(rand(1, 23), 2, '0', STR_PAD_LEFT) }}.jpg"
                                    class="img-fluid" alt="img-22">
                            @endif
                            <a href="{{ $url }}"></a>
                        </div>
                        <div class="blog-card-date">
                            <a href="{{ $url }}">{{ \Carbon\Carbon::parse($lp->tanggal)->format('j M') }}</a>

                        </div><!-- blog-card-date -->
                        <div class="blog-card-content">
                            <div class="blog-card-meta">
                                <span class="author">
                                    by <a href="{{ $url }}"> {{ $lp->user_name }}</a>
                                </span><!-- author -->
                                @if (count($lp->comment) > 0)
                                    <span class="comment">
                                        <a href="{{ $url }}"> {{ count($lp->comment) }} Komentar</a>
                                    </span>
                                @endif
                                @if ($lp->view > 0)
                                    <span class="view">
                                        <a href="{{ $url }}">{{ $lp->view }} Dilikat</a>
                                    </span>
                                @endif
                            </div>
                            <h4><a href="{{ $url }}">{{ $lp->judul }}</a></h4>
                            <p>{{ substr(strip_tags($lp->content), 0, 100) }}</p>
                        </div><!-- blog-card-content -->
                    </div>
                </div>
            @endforeach
        </div><!-- row -->
    </div><!-- container -->
</section>
