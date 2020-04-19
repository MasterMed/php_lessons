<?php
define('DOCROOT', __DIR__.'/');
define('CORE', DOCROOT.'core/');

include CORE.'Template.php';
include CORE.'Launcher.php';

template_show();