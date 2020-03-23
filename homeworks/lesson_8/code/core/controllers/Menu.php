<?php

$quantity = sql_selectOne('basket', 'SUM(`quantity`)', "cookie_id = '".userCookie()."' AND status = '0'");

$menu = [
    ['label' => 'Главная', 'url' => '/'],
    ['label' => 'Каталог', 'url' => '/catalog/'],
    ['label' => 'Галерея', 'menu' => [
            ['label' => 'Галерея', 'url' => '/gallery/'],
            ['label' => 'Загрузить', 'url' => '/gallery/upload/'],
        ],
    ],
    ['label' => 'Калькулятор', 'menu' => [
            ['label' => 'Калькулятор', 'url' => '/calculate/'],
            ['label' => 'Калькулятор 2', 'url' => '/calculate/second/'],
            ['label' => 'Калькулятор 3', 'url' => '/calculate/alternative/'],
        ]        
    ],
    ['label' => 'Отзывы', 'url' => '/feedbacks/'],
    ['label' => 'Корзина <sup id="cart_quant">'.intval($quantity[0]).'</sup>', 'url' => '/basket/'],
];

if (isUser()) {
    if(isAdmin()) {
        $menu[] = ['label' => 'Админпанель', 'url' => '/admin/'];
    }
    $menu[] = ['label' => 'Выйти ('.getUserName().')', 'url' => '/user/logout/'];    
} else {
    $menu[] = ['label' => 'Войти', 'url' => '/user/login/'];
}

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