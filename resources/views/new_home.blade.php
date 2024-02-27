@extends('template/index')
@section('content')
    <div class="container main-wrapper">
        <!-- End Main Banner -->
        {{-- <div class="mag-content clearfix">
            <div class="row">
                <div class="col-md-12">
                    <div class="ad728-wrapper">
                        <a href="#">
                            <img src="img/ban728.jpg" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- End Main Banner -->
        <div class="main-content mag-content clearfix">

            @include('componen_home.section_1')
            <div class="row main-body" data-stickyparent>
                <div class="col-md-8">
                    <section class="admag-block">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="news-feed">
                                    <h3 class="block-title"><span>Just Posted</span></h3>
                                    <ul class="widget-content">
                                        <li>
                                            <article>
                                                <h3>
                                                    <a href="#">What the Viny "Comeback" Really Looks
                                                        Like</a>
                                                </h3>
                                                <p><span><i class="fa fa-clock-o"></i> 2 minutes ago</span></p>
                                            </article>
                                        </li>

                                        <li>
                                            <article>
                                                <h3>
                                                    <a href="#">Does going to the gym count as a sport?</a>
                                                </h3>
                                                <p><span><i class="fa fa-clock-o"></i> 2 minutes ago</span></p>
                                            </article>
                                        </li>

                                        <li>
                                            <article>
                                                <h3>
                                                    <a href="#">Older actors still hot in Hollywood</a>
                                                </h3>
                                                <p><span><i class="fa fa-clock-o"></i> 3 minutes ago</span></p>
                                            </article>
                                        </li>

                                        <li>
                                            <article>
                                                <h3>
                                                    <a href="#">5 Gadget Gifts for Father's Day</a>
                                                </h3>
                                                <p><span><i class="fa fa-clock-o"></i> 3 minutes ago</span></p>
                                            </article>
                                        </li>

                                        <li>
                                            <article>
                                                <h3>
                                                    <a href="#">Inside U2's Ambitious Upcoming Tour
                                                        Strategy</a>
                                                </h3>
                                                <p><span><i class="fa fa-clock-o"></i> 5 minutes ago</span></p>
                                            </article>
                                        </li>

                                        <li>
                                            <article>
                                                <h3>
                                                    <a href="#">Mariah Carey is a spontaneous car singing
                                                        hero</a>
                                                </h3>
                                                <p><span><i class="fa fa-clock-o"></i> 10 minutes ago</span></p>
                                            </article>
                                        </li>

                                        <li>
                                            <article>
                                                <h3>
                                                    <a href="#">World Grand Prix schedule & scores</a>
                                                </h3>
                                                <p><span><i class="fa fa-clock-o"></i> 15 minutes ago</span></p>
                                            </article>
                                        </li>

                                        <li>
                                            <article>
                                                <h3>
                                                    <a href="#">The 20 most important Instagram pictures of
                                                        all time</a>
                                                </h3>
                                                <p><span><i class="fa fa-clock-o"></i> 20 minutes ago</span></p>
                                            </article>
                                        </li>

                                        <li>
                                            <article>
                                                <h3>
                                                    <a href="#">How Technology Is Revolutionizing the
                                                        Franchise World</a>
                                                </h3>
                                                <p><span><i class="fa fa-clock-o"></i> 23 minutes ago</span></p>
                                            </article>
                                        </li>

                                        <li>
                                            <article>
                                                <h3>
                                                    <a href="#">Who was man of the match and who
                                                        disappeared?</a>
                                                </h3>
                                                <p><span><i class="fa fa-clock-o"></i> 35 minutes ago</span></p>
                                            </article>
                                        </li>

                                        <li>
                                            <article>
                                                <h3>
                                                    <a href="#">How Bollywood is romancing with period films
                                                        to woo modern audience</a>
                                                </h3>
                                                <p><span><i class="fa fa-clock-o"></i> 42 minutes ago</span></p>
                                            </article>
                                        </li>

                                        <li>
                                            <article>
                                                <h3>
                                                    <a href="#">6 Tips Before Traveling Internationally</a>
                                                </h3>
                                                <p><span><i class="fa fa-clock-o"></i> 46 minutes ago</span></p>
                                            </article>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-9">

                                <article class="news-block">
                                    <a href="#" class="overlay-link">
                                        <figure class="image-overlay">
                                            <img src="img/big-thumb/big_thumb2.jpg" alt="">
                                        </figure>
                                    </a>
                                    <a href="#" class="category">
                                        Gadget
                                    </a>
                                    <div class="news-details">
                                        <h3 class="news-title">
                                            <a href="#">
                                                5 Gadget Gifts for Father's Day
                                            </a>
                                        </h3>
                                        <p>I can't get involved! I've got work to do! It's not that I like the
                                            Empire, I hate it, but there's nothing I can do about it right now. It's
                                            such a long way from here.</p>
                                        <p class="simple-share">
                                            by <a href="#"><b>John Doe</b></a> -
                                            <span class="article-date"><i class="fa fa-clock-o"></i> 3 minutes
                                                ago</span>
                                        </p>
                                    </div>
                                </article>

                                <article class="simple-post clearfix">
                                    <div class="simple-thumb">
                                        <a href="#">
                                            <img src="img/small-thumb/small_thumb1.jpg" alt="">
                                        </a>
                                    </div>
                                    <header>
                                        <h3>
                                            <a href="#">Audio Equalizer Apps Beyond the Smartphone Sound</a>
                                        </h3>
                                        <p class="simple-share">
                                            <a href="#">Gadget</a> /
                                            by <a href="#">John Doe</a> -
                                            <span><i class="fa fa-clock-o"></i> 25 minutes ago</span>
                                        </p>
                                    </header>
                                </article>

                                <article class="simple-post clearfix">
                                    <div class="simple-thumb">
                                        <a href="#">
                                            <img src="img/small-thumb/small_thumb4.jpg" alt="">
                                        </a>
                                    </div>
                                    <header>
                                        <h3>
                                            <a href="#">Smartwatch App Concepts You Need to See</a>
                                        </h3>
                                        <p class="simple-share">
                                            <a href="#">Gadget</a> /
                                            by <a href="#">John Doe</a> -
                                            <span><i class="fa fa-clock-o"></i> 1 hour ago</span>
                                        </p>
                                    </header>
                                </article>

                                <article class="simple-post clearfix">
                                    <div class="simple-thumb">
                                        <a href="#">
                                            <img src="img/small-thumb/small_thumb2.jpg" alt="">
                                        </a>
                                    </div>
                                    <header>
                                        <h3>
                                            <a href="#">How to Buy the Right Headphones</a>
                                        </h3>
                                        <p class="simple-share">
                                            <a href="#">Gadget</a> /
                                            by <a href="#">John Doe</a> -
                                            <span><i class="fa fa-clock-o"></i> 3 hours ago</span>
                                        </p>
                                    </header>
                                </article>

                                <article class="simple-post clearfix">
                                    <div class="simple-thumb">
                                        <a href="#">
                                            <img src="img/small-thumb/small_thumb3.jpg" alt="">
                                        </a>
                                    </div>
                                    <header>
                                        <h3>
                                            <a href="#">Top 10 Best Selfie Sticks In 2015</a>
                                        </h3>
                                        <p class="simple-share">
                                            <a href="#">Gadget</a> /
                                            by <a href="#">John Doe</a> -
                                            <span><i class="fa fa-clock-o"></i> 6 hours ago</span>
                                        </p>
                                    </header>
                                </article>

                            </div><!-- End mid column -->
                        </div>
                    </section>

                    <!-- BEGIN BLOCK 2 -->
                    <section class="news-text-block">
                        <div class="row">
                            <div class="col-md-12">

                                <h3 class="block-title"><span><a href="#">Lifestyle</a></span></h3>

                                <article class="news-block big-block">
                                    <a href="#" class="overlay-link">
                                        <figure class="image-overlay">
                                            <img src="img/big-thumb/big_thumb15.jpg" alt="">
                                        </figure>
                                    </a>
                                    <a href="#" class="category">
                                        Advice
                                    </a>
                                    <header class="news-details">
                                        <h3 class="news-title">
                                            <a href="#">
                                                7 Tips for Creating a Functional Home Workspace
                                            </a>
                                        </h3>
                                        <p>I can't get involved! I've got work to do! It's not that I like the
                                            Empire, I hate it, but there's nothing I can do about it right now. It's
                                            such a long way from here. Hokey religions and ancient weapons are no
                                            match for a good blaster at your side, kid. I'm surprised you had the
                                            courage to take the responsibility yourself.</p>
                                        <p class="simple-share">
                                            by <a href="#"><b>John Doe</b></a> -
                                            <span class="article-date"><i class="fa fa-clock-o"></i> 3 minutes
                                                ago</span>
                                        </p>
                                    </header>
                                </article><!-- News block -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <article class="news-block small-block">
                                    <a href="#" class="overlay-link">
                                        <figure class="image-overlay">
                                            <img src="img/big-thumb/big_thumb42.jpg" alt="">
                                        </figure>
                                    </a>
                                    <a href="#" class="category">
                                        Travel
                                    </a>
                                    <header class="news-details">
                                        <h3 class="news-title">
                                            <a href="#">
                                                6 Tips Before Traveling Internationally
                                            </a>
                                        </h3>
                                        <p class="simple-share">
                                            by <a href="#"><b>John Doe</b></a> -
                                            <span class="article-date"><i class="fa fa-clock-o"></i> 46 minutes
                                                ago</span>
                                        </p>
                                    </header>
                                </article><!-- News block -->
                            </div>

                            <div class="col-md-6">
                                <article class="news-block small-block">
                                    <a href="#" class="overlay-link">
                                        <figure class="image-overlay">
                                            <img src="img/big-thumb/big_thumb43.jpg" alt="">
                                        </figure>
                                    </a>
                                    <a href="#" class="category">
                                        Advice
                                    </a>
                                    <div class="news-details">
                                        <h3 class="news-title">
                                            <a href="#">
                                                How To Be More Friendly And Social
                                            </a>
                                        </h3>
                                        <p class="simple-share">
                                            by <a href="#"><b>John Doe</b></a> -
                                            <span class="article-date"><i class="fa fa-clock-o"></i> 2 hours
                                                ago</span>
                                        </p>
                                    </div>
                                </article><!-- News block -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <article class="news-block small-block">
                                    <a href="#" class="overlay-link">
                                        <figure class="image-overlay">
                                            <img src="img/big-thumb/big_thumb44.jpg" alt="">
                                        </figure>
                                    </a>
                                    <a href="#" class="category">
                                        Fashion
                                    </a>
                                    <header class="news-details">
                                        <h3 class="news-title">
                                            <a href="#">
                                                5 Spring Outfits For Under $200
                                            </a>
                                        </h3>
                                        <p class="simple-share">
                                            by <a href="#"><b>John Doe</b></a> -
                                            <span class="article-date"><i class="fa fa-clock-o"></i> 4 hours
                                                ago</span>
                                        </p>
                                    </header>
                                </article><!-- News block -->
                            </div>

                            <div class="col-md-6">
                                <article class="news-block small-block">
                                    <a href="#" class="overlay-link">
                                        <figure class="image-overlay">
                                            <span class="play-button"><i class="fa fa-play"></i></span>
                                            <img src="img/big-thumb/big_thumb45.jpg" alt="">
                                        </figure>
                                    </a>
                                    <a href="#" class="category">
                                        Love
                                    </a>
                                    <header class="news-details">
                                        <h3 class="news-title">
                                            <a href="#">
                                                9 Reasons To Run in the Morning
                                            </a>
                                        </h3>
                                        <p class="simple-share">
                                            by <a href="#"><b>John Doe</b></a> -
                                            <span class="article-date"><i class="fa fa-clock-o"></i> 6 hours
                                                ago</span>
                                        </p>
                                    </header>
                                </article><!-- News block -->
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <article class="news-block small-block">
                                    <a href="#" class="overlay-link">
                                        <figure class="image-overlay">
                                            <img src="img/big-thumb/big_thumb46.jpg" alt="">
                                        </figure>
                                    </a>
                                    <a href="#" class="category">
                                        Advice
                                    </a>
                                    <header class="news-details">
                                        <h3 class="news-title">
                                            <a href="#">
                                                Never Ask a Busy Person to Lunch
                                            </a>
                                        </h3>
                                        <p class="simple-share">
                                            by <a href="#"><b>John Doe</b></a> -
                                            <span class="article-date"><i class="fa fa-clock-o"></i> 4 hours
                                                ago</span>
                                        </p>
                                    </header>
                                </article><!-- News block -->
                            </div>

                            <div class="col-md-6">
                                <article class="news-block small-block">
                                    <a href="#" class="overlay-link">
                                        <figure class="image-overlay">
                                            <span class="play-button"><i class="fa fa-play"></i></span>
                                            <img src="img/big-thumb/big_thumb47.jpg" alt="">
                                        </figure>
                                    </a>
                                    <a href="#" class="category">
                                        Food
                                    </a>
                                    <header class="news-details">
                                        <h3 class="news-title">
                                            <a href="#">
                                                How to Make Perfect Homemade Pizza
                                            </a>
                                        </h3>
                                        <p class="simple-share">
                                            by <a href="#"><b>John Doe</b></a> -
                                            <span class="article-date"><i class="fa fa-clock-o"></i> 12 hours
                                                ago</span>
                                        </p>
                                    </header>
                                </article><!-- News block -->
                            </div>

                        </div>

                    </section>
                    <!-- END BLOCK 2 -->

                    <section class="admag-block">
                        <div class="row">
                            <div class="col-md-6 news-text-block">
                                <h3 class="block-title"><span>Movies</span></h3>

                                <article class="widget-post clearfix">
                                    <div class="simple-thumb">
                                        <a href="#">
                                            <img src="img/small-thumb/small_thumb7.jpg" alt="">
                                        </a>
                                    </div>
                                    <header>
                                        <h3>
                                            <a href="#">Older actors still hot in Hollywood</a>
                                        </h3>
                                        <p class="simple-share">
                                            <span><i class="fa fa-clock-o"></i> 3 minutes ago</span>
                                        </p>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">How Bollywood is romancing with period films to woo modern
                                                audience</a>
                                        </h3>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">9 Curious Facts About Charlie Chaplin</a>
                                        </h3>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">5 Space Movies to Watch in 2015</a>
                                        </h3>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">What is the average budget for a Hollywood movie?</a>
                                        </h3>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">15 Of The Best Modern Movies About Selling</a>
                                        </h3>
                                    </header>
                                </article>
                            </div>

                            <div class="col-md-6 news-text-block">
                                <h3 class="block-title"><span>Musics</span></h3>

                                <article class="widget-post clearfix">
                                    <div class="simple-thumb">
                                        <a href="#">
                                            <img src="img/small-thumb/small_thumb6.jpg" alt="">
                                        </a>
                                    </div>
                                    <header>
                                        <h3>
                                            <a href="#">Inside U2's Ambitious Upcoming Tour Strategy</a>
                                        </h3>
                                        <p class="simple-share">
                                            <span><i class="fa fa-clock-o"></i> 5 minutes ago</span>
                                        </p>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">Mariah Carey is a spontaneous car singing hero</a>
                                        </h3>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">What’s Next For One Direction?</a>
                                        </h3>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">This DJ Makes Music From The Heart — Literally</a>
                                        </h3>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">11 Truths All People Who Have Dated A Musician Will
                                                Understand</a>
                                        </h3>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">
                                                These K-Pop Stars Are Leading A ’90s Pop Music Revival — And We’re Totally
                                                Here For It</a>
                                        </h3>
                                    </header>
                                </article>
                            </div>

                            {{-- <div class="col-md-4 news-text-block">
                                <h3 class="block-title"><span>Sports</span></h3>

                                <article class="widget-post clearfix">
                                    <div class="simple-thumb">
                                        <a href="#">
                                            <img src="img/small-thumb/small_thumb5.jpg" alt="">
                                        </a>
                                    </div>
                                    <header>
                                        <h3>
                                            <a href="#">Does going to the gym count as a sport?</a>
                                        </h3>
                                        <p class="simple-share">
                                            <span><i class="fa fa-clock-o"></i> 2 minutes ago</span>
                                        </p>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">World Grand Prix schedule & scores</a>
                                        </h3>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">Who was man of the match and who disappeared?</a>
                                        </h3>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">Messi better than Ronaldo, says Pele</a>
                                        </h3>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">Barcelona beats Real Madrid 2-1 in El Clasico</a>
                                        </h3>
                                    </header>
                                </article>

                                <article class="widget-post clearfix">
                                    <header>
                                        <h3>
                                            <a href="#">Motor racing-Alonso cleared to fly to Malaysia-reports</a>
                                        </h3>
                                    </header>
                                </article>
                            </div> --}}
                        </div><!-- End news list -->
                    </section><!-- .admag-block -->


                </div><!-- End Left big column -->

                <div class="col-md-4" data-stickycolumn>
                    <aside class="sidebar clearfix">
                        <h3 class="block-title"><span>Sambutan Kepala Dinas</span></h3>
                        <div class="widget author-widget">

                            <div class="author-thumb">
                                <a href="page_author.html">
                                    <img alt="John Doe" src="img/author-big-thumb.jpg" class="avatar">
                                </a>
                            </div>
                            <div class="author-meta">
                                <h3 class="author-title">
                                    <a href="page_author.html">Dian Firnandy, SE</a>
                                </h3>
                                <p class="author-position">Kepala Dinas</p>
                                <p class="author-bio">Mewujudkan tata kelola pemerintahan yang bersih dan berbasis
                                    teknologi informasi serta mewujudkan perekonomian daerah yang berdaya saing dan
                                    berkelanjutan.</p>
                                <div class="author-page-contact">
                                    <a href="#">
                                        <i class="fa fa-envelope-o"></i>
                                    </a>
                                    <a href="#" target="_blank">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <a href="#" target="_blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="widget searchwidget">
                            <form class="searchwidget-form">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i
                                                class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>

                        <div class="widget tabwidget">
                            <ul class="nav nav-tabs" role="tablist" id="widget-tab">
                                <li role="presentation" class="active"><a href="#tab-popular"
                                        aria-controls="tab-popular" role="tab" data-toggle="tab">Popular</a>
                                </li>
                                <li role="presentation"><a href="#tab-recent" aria-controls="tab-recent" role="tab"
                                        data-toggle="tab">Recent</a></li>
                                <li role="presentation"><a href="#tab-comments" aria-controls="tab-comments"
                                        role="tab" data-toggle="tab">Comments</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab-popular">

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb13.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">The 10 most beautiful cars money can buy</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-eye"></i> 1,129,753 views</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <span class="play-button"><i class="fa fa-play"></i></span>
                                                <img src="img/small-thumb/small_thumb12.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">Asian Startup Companies Boom</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-eye"></i> 989,039 views</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb14.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">9 Apps for Transforming Your Phone into The
                                                    Ultimate Toolkit</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 920,540 views</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb15.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">15 Books You Should Read Before They Become
                                                    Movies This Year</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 780,540 views</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb16.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">The 20 most important Instagram pictures of all
                                                    time</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 725,566 views</span>
                                            </p>
                                        </header>
                                    </article>

                                </div><!-- Popular posts -->
                                <div role="tabpanel" class="tab-pane" id="tab-recent">

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb8.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">7 Tips for Creating a Functional Home
                                                    Workspace</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 2 minutes ago</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb5.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">Does going to the gym count as a sport?</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 2 minutes ago</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb7.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">Older actors still hot in Hollywood</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 3 minutes ago</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb10.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">5 Gadget Gifts for Father's Day</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 3 minutes ago</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb6.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">Inside U2's Ambitious Upcoming Tour Strategy</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 5 minutes ago</span>
                                            </p>
                                        </header>
                                    </article>

                                </div><!-- Recent Posts -->

                                <div role="tabpanel" class="tab-pane" id="tab-comments">
                                    <div class="widget-post clearfix">
                                        <div class="author-thumb">
                                            <a href="#">
                                                <img src="img/author1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div>
                                            <h3>
                                                <a href="#">How to Buy the Right Headphones</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 12 minutes ago</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="widget-post clearfix">
                                        <div class="author-thumb">
                                            <a href="#">
                                                <img src="img/author2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div>
                                            <h3>
                                                <a href="#">6 Tips Before Traveling Internationally</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 26 minutes ago</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="widget-post clearfix">
                                        <div class="author-thumb">
                                            <a href="#">
                                                <img src="img/author1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div>
                                            <h3>
                                                <a href="#">The Partnership of Coffee and Tech</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 34 minutes ago</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="widget-post clearfix">
                                        <div class="author-thumb">
                                            <a href="#">
                                                <img src="img/author3.jpg" alt="">
                                            </a>
                                        </div>
                                        <div>
                                            <h3>
                                                <a href="#">8 Ways to Know If Your Business Is Ready to
                                                    Franchise</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 40 minutes ago</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="widget-post clearfix">
                                        <div class="author-thumb">
                                            <a href="#">
                                                <img src="img/author-thumb.jpg" alt="">
                                            </a>
                                        </div>
                                        <div>
                                            <h3>
                                                <a href="#">Tickets and prices for Metro and public
                                                    transport in Milan</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 54 minutes ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- Comments -->
                            </div>
                        </div>

                        <div class="widget tagwidget">
                            <h3 class="block-title"><span>Tags</span></h3>
                            <ul class="tags-widget">
                                <li><a href="#">Windows 10</a></li>
                                <li><a href="#">FIFA 2015</a></li>
                                <li><a href="#">iPhone 6</a></li>
                                <li><a href="#">Flappy Bird</a></li>
                                <li><a href="#">World Cup</a></li>
                                <li><a href="#">WeChat desktop</a></li>
                                <li><a href="#">Clash of Clans</a></li>
                                <li><a href="#">Apple Watch</a></li>
                                <li><a href="#">Oscar 2015</a></li>
                                <li><a href="#">Taken 3</a></li>
                                <li><a href="#">Lego</a></li>
                            </ul>
                        </div>

                        <div class="widget reviewwidget">
                            <h3 class="block-title"><span>Reviews</span></h3>

                            <article class="widget-post clearfix">
                                <div class="simple-thumb">
                                    <a href="#">
                                        <img src="img/small-thumb/small_thumb17.jpg" alt="">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a href="#">Nikon D5000 review: Design, Controls, Screen</a>
                                    </h3>
                                    <p class="simple-share">
                                        <span class="star-reviews">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                    </p>
                                </header>
                            </article>

                            <article class="widget-post clearfix">
                                <div class="simple-thumb">
                                    <a href="#">
                                        <img src="img/small-thumb/small_thumb18.jpg" alt="">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a href="#">Apple iOS 8 Review</a>
                                    </h3>
                                    <p class="simple-share">
                                        <span class="star-reviews">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </span>
                                    </p>
                                </header>
                            </article>

                            <article class="widget-post clearfix">
                                <div class="simple-thumb">
                                    <a href="#">
                                        <img src="img/small-thumb/small_thumb19.jpg" alt="">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a href="#">Canon 70D review</a>
                                    </h3>
                                    <p class="simple-share">
                                        <span class="star-reviews">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </p>
                                </header>
                            </article>

                            <article class="widget-post clearfix">
                                <div class="simple-thumb">
                                    <a href="#">
                                        <img src="img/small-thumb/small_thumb20.jpg" alt="">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a href="#">iMac review</a>
                                    </h3>
                                    <p class="simple-share">
                                        <span class="star-reviews">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </span>
                                    </p>
                                </header>
                            </article>

                        </div><!-- End review widget -->

                        <div class="widget categorywidget">
                            <h3 class="block-title"><span>Categories</span></h3>
                            <ul>
                                <li>
                                    <a href="#">Tech <span class="count">25</span></a>
                                </li>
                                <li>
                                    <a href="#">Lifestyle <span class="count">23</span></a>
                                </li>
                                <li>
                                    <a href="#">Business <span class="count">19</span></a>
                                </li>
                                <li>
                                    <a href="#">Entertainment <span class="count">20</span></a>
                                </li>
                            </ul>
                        </div>

                        <div class="widget adwidget subscribewidget">
                            <h3 class="block-title"><span>Subscribe</span></h3>
                            <p>The more you tighten your grip, Tarkin, the more star systems will slip through your
                                fingers.</p>
                            <form class="form-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter your email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Subscribe</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="widget social-links">
                            <h3 class="block-title"><span>Follow us</span></h3>
                            <ul class="social-list">

                                <li class="social-facebook">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                        data-original-title="Facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="social-twitter" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Twitter">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="social-gplus">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                        data-original-title="Google+">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="social-youtube">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                        data-original-title="Youtube">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="social-instagram">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                        data-original-title="Instagram">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="social-pinterest">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                        data-original-title="Pinterest">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li class="social-rss">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                        data-original-title="RSS">
                                        <i class="fa fa-rss"></i>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- .widget .social-links -->

                        <div class="widget">
                            <h3 class="block-title"><span>Gallery</span></h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="flexslider">
                                        <div class="featured-slider">
                                            <div class="slider-item">
                                                <img src="img/medium-thumb/slider1.jpg" alt="">
                                            </div>

                                            <div class="slider-item">
                                                <img src="img/medium-thumb/slider2.jpg" alt="">
                                            </div>

                                            <div class="slider-item">
                                                <img src="img/medium-thumb/slider3.jpg" alt="">
                                            </div>

                                            <div class="slider-item">
                                                <img src="img/medium-thumb/slider4.jpg" alt="">
                                            </div>

                                            <div class="slider-item">
                                                <img src="img/medium-thumb/slider5.jpg" alt="">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .widget -->

                        <h3 class="block-title"><span>Links</span></h3>
                        <div class="widget bannerwidget">
                            <div class="widget-125 clearfix">
                                <a href="#" target="_blank"><img src="img/theme_forest_125x125.jpg"
                                        alt="Banner"></a>
                                <a href="#" target="_blank"><img src="img/audio_jungle_125x125.jpg" alt="Banner"
                                        title="Banner" width="125" height="125" class="visible animated"></a>
                                <a href="#" target="_blank"><img src="img/code_canyon_125x125.jpg" alt="Banner"
                                        title="Banner" width="125" height="125" class="visible animated"></a>
                                <a href="#" target="_blank"><img src="img/graphic_river_125x125.jpg"
                                        alt="Banner" title="Banner" width="125" height="125"
                                        class="visible animated"></a>
                            </div>
                        </div>
                    </aside>
                </div><!-- End last column -->
            </div><!-- .main-body -->

            {{-- <section class="admag-block">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="block-title"><span>Tech Spot</span></h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <article class="featured-small box-news box-big">
                            <a href="#">
                                <img src="img/big-thumb/huge_thumb1.jpg" alt="">
                            </a>
                            <header class="featured-header">
                                <a class="category bgcolor2" href="#">Gadget</a>
                                <h2><a href="#">Audio Equalizer Apps Beyond the Smartphone Sound</a></h2>
                                <p class="simple-share">
                                    by <a href="#"><b>John Doe</b></a> -
                                    <span class="article-date">25 minutes ago</span>
                                </p>
                            </header>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="featured-small box-news">
                            <a href="#">
                                <img src="img/big-thumb/big_thumb11.jpg" alt="">
                            </a>
                            <header class="featured-header">
                                <a class="category bgcolor2" href="#">Apps</a>
                                <h2><a href="#">Apple iOS 8 Review</a></h2>
                                <p class="simple-share">
                                    by <a href="#"><b>John Doe</b></a> -
                                    <span class="article-date">34 minutes ago</span>
                                    <span class="star-reviews">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                </p>
                            </header>
                        </article>
                    </div>

                </div><!--End small box -->

                <div class="row">

                    <div class="col-md-4">
                        <article class="featured-small box-news">
                            <a href="#">
                                <img src="img/big-thumb/big_thumb8.jpg" alt="">
                            </a>
                            <header class="featured-header">
                                <a class="category bgcolor2" href="#">Mobile</a>
                                <h2><a href="#">The Partnership of Coffee and Tech</a></h2>
                                <p class="simple-share">
                                    by <a href="#"><b>John Doe</b></a> -
                                    <span class="article-date">52 minutes ago</span>
                                </p>
                            </header>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="featured-small box-news">
                            <a href="#">
                                <span class="play-button"><i class="fa fa-play"></i></span>
                                <img src="img/big-thumb/big_thumb9.jpg" alt="">
                            </a>
                            <header class="featured-header">
                                <a class="category bgcolor2" href="#">Design</a>
                                <h2><a href="#">Nikon D5000 review: Design, Controls, Screen</a></h2>
                                <p class="simple-share">
                                    by <a href="#"><b>John Doe</b></a> -
                                    <span class="article-date">1 hour ago</span>
                                    <span class="star-reviews">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                </p>
                            </header>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="featured-small box-news">
                            <a class="play-button" href="#"><i class="fa fa-camera"></i></a>
                            <a href="#">
                                <img src="img/big-thumb/big_thumb7.jpg" alt="">
                            </a>
                            <header class="featured-header">
                                <a class="category bgcolor2" href="#">Mobile</a>
                                <h2><a href="#">What the Viny "Comeback" Really Looks Like</a></h2>
                                <p class="simple-share">
                                    by <a href="#"><b>John Doe</b></a> -
                                    <span class="article-date">2 hours ago</span>
                                </p>
                            </header>
                        </article>
                    </div>
                </div><!-- End big box -->
            </section> --}}


            <div class="row" data-stickyparent>
                <div class="col-md-8">
                    <section class="admag-block">
                        <h3 class="block-title"><span>Business</span></h3>

                        <article class="news-block big-block">
                            <a href="#" class="overlay-link">
                                <figure class="image-overlay">
                                    <img src="img/big-thumb/big_thumb14.jpg" alt="">
                                </figure>
                            </a>
                            <a href="#" class="category">
                                Business
                            </a>
                            <header class="news-details">
                                <h3 class="news-title">
                                    <a href="#">
                                        3 things I learned about running startup board meetings
                                    </a>
                                </h3>
                                <p>As you wish. Dantooine. They're on Dantooine. Alderaan? I'm not going to
                                    Alderaan. I've got to go home. It's late, I'm in for it as it is. Red Five
                                    standing by.</p>
                                <p class="simple-share">
                                    by <a href="#"><b>John Doe</b></a> -
                                    <span class="article-date"><i class="fa fa-clock-o"></i> 10 minutes
                                        ago</span>
                                </p>
                            </header>
                        </article>

                        <article class="simple-post simple-big clearfix">
                            <div class="simple-thumb">

                                <a href="#">
                                    <img src="img/medium-thumb/med_thumb3.jpg" alt="">
                                </a>
                            </div>
                            <header>
                                <p class="simple-share">
                                    <a href="#">Business</a> /
                                    by <a href="#">John Doe</a> -
                                    <span><i class="fa fa-clock-o"></i> 23 minutes ago</span>
                                </p>

                                <h3>
                                    <a href="#">How Technology Is Revolutionizing the Franchise World</a>
                                </h3>

                                <p class="excerpt">
                                    Partially, but it also obeys your commands. What?! Alderaan? I'm not going to
                                    Alderaan. I've got to go home. It's late, I'm in for it as it is.
                                </p>
                            </header>
                        </article>

                        <article class="simple-post simple-big clearfix">
                            <div class="simple-thumb">
                                <a href="#">
                                    <img src="img/medium-thumb/med_thumb1.jpg" alt="">
                                </a>
                            </div>
                            <header>
                                <p class="simple-share">
                                    <a href="#">Business</a> /
                                    by <a href="#">John Doe</a> -
                                    <span><i class="fa fa-clock-o"></i> 49 minutes ago</span>
                                </p>

                                <h3>
                                    <a href="#">8 Ways to Know If Your Business Is Ready to Franchise</a>
                                </h3>

                                <p class="excerpt">
                                    Partially, but it also obeys your commands. What?! Alderaan? I'm not going to
                                    Alderaan. I've got to go home. It's late, I'm in for it as it is.
                                </p>
                            </header>
                        </article>

                        <article class="simple-post simple-big clearfix">
                            <div class="simple-thumb">
                                <a href="#">
                                    <span class="play-button"><i class="fa fa-play"></i></span>
                                    <img src="img/medium-thumb/med_thumb2.jpg" alt="">
                                </a>
                            </div>
                            <header>
                                <p class="simple-share">
                                    <a href="#">Business</a> /
                                    by <a href="#">John Doe</a> -
                                    <span><i class="fa fa-clock-o"></i> 1 hour ago</span>
                                </p>

                                <h3>
                                    <a href="#">9 Business Leaders Share the Best and Worst Advice They've
                                        Heard</a>
                                </h3>

                                <p class="excerpt">
                                    Partially, but it also obeys your commands. What?! Alderaan? I'm not going to
                                    Alderaan. I've got to go home. It's late, I'm in for it as it is.
                                </p>
                            </header>
                        </article>

                        <article class="simple-post simple-big clearfix">
                            <div class="simple-thumb">
                                <a href="#">
                                    <img src="img/medium-thumb/med_thumb54.jpg" alt="">
                                </a>
                            </div>
                            <header>
                                <p class="simple-share">
                                    <a href="#">Business</a> /
                                    by <a href="#">John Doe</a> -
                                    <span><i class="fa fa-clock-o"></i> 2 hours ago</span>
                                </p>

                                <h3>
                                    <a href="#">Mainland Stock Buyers Hunt Bargains in Hong Kong</a>
                                </h3>

                                <p class="excerpt">
                                    Partially, but it also obeys your commands. What?! Alderaan? I'm not going to
                                    Alderaan. I've got to go home. It's late, I'm in for it as it is.
                                </p>
                            </header>
                        </article>

                        <article class="simple-post simple-big clearfix">
                            <div class="simple-thumb">
                                <a href="#">
                                    <span class="play-button"><i class="fa fa-play"></i></span>
                                    <img src="img/medium-thumb/med_thumb55.jpg" alt="">
                                </a>
                            </div>
                            <header>
                                <p class="simple-share">
                                    <a href="#">Business</a> /
                                    by <a href="#">John Doe</a> -
                                    <span><i class="fa fa-clock-o"></i> 2 hours ago</span>
                                </p>

                                <h3>
                                    <a href="#">Tickets and prices for Metro and public transport in
                                        Milan</a>
                                </h3>

                                <p class="excerpt">
                                    Partially, but it also obeys your commands. What?! Alderaan? I'm not going to
                                    Alderaan. I've got to go home. It's late, I'm in for it as it is.
                                </p>
                            </header>
                        </article>
                    </section><!-- .admag-block -->

                    <div class="load-more">
                        <button type="button" class="btn btn-lg btn-block">Load more</button>
                    </div>

                </div>
                <div class="col-md-4" data-stickycolumn>

                </div><!-- .col-md-4 .sticky-div -->
            </div>

        </div><!-- .main-content -->

        <!-- End Main Banner -->
        <div class="mag-content clearfix">
            <div class="row">
                <div class="col-md-12">
                    <div class="ad728-wrapper">
                        <a href="#">
                            <img src="img/ban728.jpg" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Banner -->
    </div>
@endsection
