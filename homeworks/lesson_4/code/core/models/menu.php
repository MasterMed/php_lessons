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
