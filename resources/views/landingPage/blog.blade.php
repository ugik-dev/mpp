<section class="blog-section">
    <div class="container">
        <div class="blog-box">
            <div class="section-title-box text-center">
                <div class="section-tagline">Terbaru</div>
                <h2 class="section-title"> Berita dan Arikel</h2>
            </div><!-- section-title-box -->
        </div><!--blog-box-->
        <div class="row row-gutter-y-155">
            @foreach ($lates_post as $lp)
                @php
                    $url = url('blog/' . $lp->ref_content->prefix . '/' . $lp->slug);
                    // $carbonDate = Carbon::parse($lp->tanggal);
                    // $tanggalFormatted = $carbonDate->format('j M');
                @endphp
                <div class="col-lg-4">
                    <div class="blog-card">
                        <div class="blog-card-image">
                            <img src="assets/image/blog/blog-1.jpg" class="img-fluid" alt="img-22">
                            <a href="{{ $url }}"></a>
                        </div>
                        <div class="blog-card-date">
                            <a href="{{ $url }}">{{ \Carbon\Carbon::parse($lp->tanggal)->format('j M') }}</a>

                        </div><!-- blog-card-date -->
                        <div class="blog-card-content">
                            <div class="blog-card-meta">
                                <span class="author">
                                    by<a href="{{ $url }}">Admin</a>
                                </span><!-- author -->
                                <span class="comment">
                                    <a href="{{ $url }}">02 Comments</a>
                                </span><!-- comment -->
                            </div><!-- blog-card-meta -->
                            <h4><a href="{{ $url }}">{{ $lp->judul }}</a></h4>
                            <p>Tellus amet vel nisi, vel felis morbi sit et. Risus, pulvinar ultricie</p>
                        </div><!-- blog-card-content -->
                    </div>
                </div>
            @endforeach
        </div><!-- row -->
    </div><!-- container -->
</section>
