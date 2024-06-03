<div class="sidebar-widget sidebar-widget-recent-category">
    <div class="sidebar-widget-recent-category-box">
        <h4 class="section-title text-left">Album</h4>
        <ul class="list-unstyled">
            @foreach ($albums as $alb)
                <li><a href="{{ route('album', $alb->id) }}">{{ $alb->name }}<i
                            class="fa-solid fa-chevron-right"></i></a></li>
            @endforeach
        </ul>
    </div>
</div>
