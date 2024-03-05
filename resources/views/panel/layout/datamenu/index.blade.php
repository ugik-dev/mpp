@foreach ($menus as $key => $menu)
    <li class="nav-item">
        <a class="nav-link {{ $menu['dropdown'] ? 'collapsed' : '' }}" {!! $menu['dropdown']
            ? 'href="/#" data-toggle="collapse" data-target="#collapseMenu_' . $key . '"'
            : "href='{$menu['url']}'" !!}>
            <i class="fas fa-fw fa-chart-area"></i>
            <span>{{ $menu['label'] }}</span>
        </a>

        @if ($menu['dropdown'])
            <div id="collapseMenu_{{ $key }}" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @foreach ($menu['children'] as $child)
                        <a class="collapse-item" href="{{ $child['url'] }}">{{ $child['label'] }}</a>
                    @endforeach
                </div>
            </div>
        @endif
    </li>
    {{-- @endif --}}
@endforeach
