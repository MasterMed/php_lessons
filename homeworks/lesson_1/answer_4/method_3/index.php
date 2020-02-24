<?php

define('DOCROOT', __DIR__);

require_once DOCROOT."/core/Loader.php";
$loader = new \core\Loader;
$loader->register();

use \core\Pages;
use \core\Template;

$pageData = include DOCROOT.'/data/data.php';

$p = new Pages($pageData);
$p->publish();

Template::printAll($pageData['pageTpl']);

