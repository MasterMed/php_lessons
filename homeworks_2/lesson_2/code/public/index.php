<?php
include dirname(__DIR__) . '/services/Autoloader.php';
spl_autoload_register([new Autoloader(), 'loadClass']);

$bd = new app\services\DB();
$user = new app\models\Good($bd);
echo $user->getAll();
echo '<br>';
echo $user->getOne(12);

var_dump($user->getCountTest());





