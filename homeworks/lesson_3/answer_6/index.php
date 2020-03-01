<?php
define('DOCROOT', __DIR__.'/');
define('TEMPLATES_DIR', DOCROOT.'templates/');
define('LAYOUTS_DIR', 'layouts/');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

$params = ['login' => 'admin'];
switch ($page) {
   case 'index':
       $params['name'] = 'гость';
        break;
    case 'catalog':
        $params['catalog'] = [
            [
                'name' => 'Пицца',
                'price' => 24
            ],
            [
                'name' => 'Чай',
                'price' => 1
            ],
            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ];
        break;
}
$params['menu'] = array(
    array('label' => 'Главная', 'url' => '/'),
    array('label' => 'Каталог', 'url' => '/?page=catalog'),
    array('label' => 'Родительское', 'url' => '/?page=parent', 'menu' => array(
        array('label' => 'Дочернее_1', 'url' => '/?page=child_1'),
        array('label' => 'Дочернее_2', 'url' => '/?page=child_2'),
    )),
);

function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main',
        [
            'menu' => renderTemplate('menu', $params),
            'content' => renderTemplate($page, $params)
        ]
    );
}

function renderTemplate($page, $params = [])
{
    ob_start();
    $fileName = TEMPLATES_DIR . $page . ".php";

    if (!is_null($params)) {
        extract($params);
    }

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        die("Страницы {$page} не существует. 404");
    }

    return ob_get_clean();
}


echo render($page, $params);