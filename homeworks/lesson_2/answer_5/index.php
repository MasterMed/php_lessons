<?php

$localRequestUri = str_replace('/homeworks/lesson_2/answer_5/', '', $_SERVER['REQUEST_URI']);

define('DOCROOT', __DIR__);
define('REQUEST_URI', trim($localRequestUri, '/'));

require_once DOCROOT."/core/Loader.php";
$loader = new \core\Loader;
$loader->register();

use \core\Pages;
use \core\Template;

$p = new Pages();
$p->publish();

Template::printAll();

