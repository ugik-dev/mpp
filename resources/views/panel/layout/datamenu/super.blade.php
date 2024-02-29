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
        'label' => 'Pengaturan Home',
        'dropdown' => true,
        'children' => [
            [
                'label' => 'Hero',
                'url' => route('manage.hero.index'),
            ],
            ['label' => 'Hero Icon', 'url' => route('manage.hero-icon.index')],
            ['label' => 'Hero3', 'url' => route('manage.hero.index')],
        ],
    ],
    [
        'label' => 'Pengaturan',
        'dropdown' => true,
        'children' => [['label' => 'Instansi', 'url' => route('manage.agency.index')], ['label' => 'Hero2', 'url' => route('manage.hero.index')], ['label' => 'Hero3', 'url' => route('manage.hero.index')]],
    ],
];
?>
@include('panel.layout.datamenu.index')
