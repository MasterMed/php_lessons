<?php
$data = include __DIR__.'/data/data.php';
$data['year'] = date('Y');

ob_start();
include __DIR__.'/tpl/template.php';
$template = ob_get_clean();

foreach ($data as $key => $value) {
    $template = str_replace('{'.$key.'}', $value, $template);
}

echo $template;