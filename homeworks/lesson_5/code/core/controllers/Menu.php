<?php

$menu = [
    ['label' => 'Главная', 'url' => '/'],
    ['label' => 'Каталог', 'url' => '/catalog/'],
    ['label' => 'Галерея', 'menu' => [
            ['label' => 'Галерея', 'url' => '/gallery/'],
            ['label' => 'Загрузить', 'url' => '/gallery/upload/'],
        ],
    ],
];

function menu_render($menu, $dropdownId = 'dropdown', $level = 0) {
    $classes = [
        [
            'wraper' => 'navbar-nav mr-auto',
            'menu_item' => 'nav-item',
            'menu_link' => 'nav-link'
        ],
        [
            'wraper' => 'dropdown-menu',
            'menu_item' => 'dropdown-item',
            'menu_link' => 'dropdown-item'
        ]
    ];
    if (isset($classes[$level])) {
        $class = $classes[$level];
    } else {
        $class = $classes[count($classes) - 1];
    }
    $level++;
    ob_start();
    include TEMPLATES_DIR . "elements/menu.php";
    return ob_get_clean();
}

templater_addView('{{menu}}', menu_render($menu));