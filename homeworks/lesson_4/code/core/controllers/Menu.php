<?php

include MODELS.'menu.php';

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
    include ELEMENTS . "menu.php";
    return ob_get_clean();
}

template_addView('{{menu}}', menu_render($menu));