@php
    $categories = category();
@endphp

<div class="sidebar-widget sidebar-widget-recent-category">
    <div class="sidebar-widget-recent-category-box">
        <h4 class="section-title text-left">Categories</h4>
        <ul class="list-unstyled">
            @foreach ($categories as $category)
                <li><a href="{{ url('search?s=' . $category->name) }}">{{ $category->name }}<i
                            class="fa-solid fa-chevron-right"></i></a></li>
            @endforeach
        </ul>
    </div>
</div>
