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
        'label' => 'Struktur Menu',
        'url' => route('manage.menu.index'),
        'dropdown' => false,
    ],
    [
        'label' => 'Bank Data',
        'url' => route('manage.bank-data.index'),
        'dropdown' => false,
    ],
    [
        'label' => 'e-Survey / SKM',
        'url' => route('panel.monitoring.survey'),
        'dropdown' => false,
    ],
    [
        'label' => 'Pengaduan',
        'url' => route('panel.monitoring.pengaduan'),
        'dropdown' => false,
    ],
    [
        'label' => 'Galeri',
        'dropdown' => true,
        'children' => [['label' => 'Album', 'url' => route('manage.album.index')], ['label' => 'Gambar & Video', 'url' => route('manage.galeri.index')]],
    ],
    [
        'label' => 'Pengaturan',
        'dropdown' => true,
        'children' => [
            ['label' => 'Instansi', 'url' => route('manage.agency.index')],
            [
                'label' => 'Hero',
                'url' => route('manage.hero.index'),
            ],
            ['label' => 'Hero Icon', 'url' => route('manage.hero-icon.index')],
            ['label' => 'Landing Page', 'url' => route('manage.home')],
            ['label' => 'Website', 'url' => route('manage.profile')],
            ['label' => 'Patner dan Banner', 'url' => route('manage.patner.index')],
        ],
    ],
    // [
    //     'label' => 'Pengaturan',
    //     'dropdown' => true,
    //     'children' => [['label' => 'Instansi', 'url' => route('manage.agency.index')], ['label' => 'Hero2', 'url' => route('manage.hero.index')], ['label' => 'Hero3', 'url' => route('manage.hero.index')]],
    // ],
];
?>
@include('panel.layout.datamenu.index')
