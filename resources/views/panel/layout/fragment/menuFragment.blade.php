<?php
$menus = [
    [
        'label' => 'Management User',
        'url' => route('manage.user.index'),
        'dropdown' => false,
    ],
    [
        'label' => 'Kontent',
        'url' => route('manage.content.index'),
        'dropdown' => false,
    ],
    [
        'label' => 'Layout',
        'dropdown' => true,
        'children' => [['label' => 'Hero', 'url' => route('manage.hero.index')], ['label' => 'Hero2', 'url' => route('manage.hero.index')], ['label' => 'Hero3', 'url' => route('manage.hero.index')]],
    ],
    [
        'label' => 'Pengaturan',
        'dropdown' => true,
        'children' => [['label' => 'Jenis', 'url' => route('manage.hero.index')], ['label' => 'Hero2', 'url' => route('manage.hero.index')], ['label' => 'Hero3', 'url' => route('manage.hero.index')]],
    ],
];
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <hr class="sidebar-divider my-0">


    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Addons
    </div>

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
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            @endif
        </li>
        {{-- @endif --}}
    @endforeach


    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and
            more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>

</ul>
