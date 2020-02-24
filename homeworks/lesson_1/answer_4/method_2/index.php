<?php
include __DIR__.'/data/data.php';

ob_start();
include __DIR__.'/tpl/template.php';
$template = ob_get_clean();

$template = str_replace('{title}', $title, $template);
$template = str_replace('{h1}', $h1, $template);
$template = str_replace('{content}', $content, $template);
$template = str_replace('{year}', $year, $template);

echo $template;