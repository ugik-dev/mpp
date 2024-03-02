<div class="sidebar-widget sidebar-widget-recent-post">
    <h4>Recent Posts</h4>
    <style>
        .sidebar-thumbnail {
            border: 1px solid #ddd;
            border-radius: 4px;
            /* padding: 5px; */
            width: 50px;
            height: 50px;
        }

        .sidebar-thumbnail:hover {
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }
    </style>
    @foreach ($sidbar_lates_content as $lp)
        <div class="sidebar-recent-post">
            @if ($lp->sampul)
                <a href="{{ route('blog', [$lp->prefix, $lp->slug]) }}">
                    <div class="sidebar-recent-post-img">
                        <img class="sidebar-thumbnail" src="{{ url('storage/upload/content/' . $lp->sampul) }}"
                            alt="">
                    </div><!-- sidebar-recent-post-img -->
                </a>
            @endif
            <div class="sidebar-recent-post-content">
                <div class="sidebar-meta">
                    <div class="sidebar-meta-item">
                        <div class="sidebar-meta-icon">
                            <span class="author">
                                by<a href="{{ route('blog', [$lp->prefix, $lp->slug]) }}">{{ $lp->agency_name }}</a>
                            </span>
                        </div>
                    </div>
                    <div class="sidebar-post-title">
                        <h5><a href="{{ route('blog', [$lp->prefix, $lp->slug]) }}">{{ $lp->judul }}</a></h5>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</div>
