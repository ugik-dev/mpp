<?php
$menus = [
    [
        'label' => 'Profile Instansi',
        // 'url' => route('manage.user.index'),
        'url' => url('panel/profile-instansi'),
        'dropdown' => false,
    ],
    [
        'label' => 'Kontent',
        'url' => route('manage.content.index'),
        'dropdown' => false,
    ],
    [
        'label' => 'Menu Layanan',
        'url' => route('manage.menu.index'),
        'dropdown' => false,
    ],
];
?>
@include('panel.layout.datamenu.index')
