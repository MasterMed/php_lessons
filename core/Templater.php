<?php

function templater($action = null, $renew = null) {
    static $render = '';
    switch ($action) {
        case 'start':
            ob_start();
            include TEMPLATES_DIR . 'layouts/main.php';
            $render = ob_get_clean();
            break;
        case 'renew':
            $render = $renew;
            break;

        default:
            return $render;
    }
}

function getTemplate() {
    return templater();
}

function templater_addTemplate($path = null, $file = null, $var = null) {    
    $filepath = null;
    if (strlen($file) < 50) {
        $filepath = TEMPLATES_DIR . $path . '/' . $file . '.php';
    }
    if (file_exists($filepath)) {
        if (count($var) > 0) {
            extract($var);
        }
        ob_start();
        include $filepath;
        return ob_get_clean();        
    } else { 
        return $file;
    }
}

function templater_addView($shortcode, $file, $var = array()) {
    $tpl = getTemplate();
    $replacement = templater_addTemplate('views', $file, $var);
    $tpl = str_replace($shortcode, $replacement, $tpl);
    templater('renew', $tpl);
}

function templater_addElement($shortcode, $file, $var = array()) {
    $tpl = getTemplate();
    $replacement = templater_addTemplate('elements', $file, $var);
    $tpl = str_replace($shortcode, $replacement, $tpl);
    templater('renew', $tpl);
}

function templater_start() {
    templater('start');
}

function templater_show() {
    echo templater();
}

templater_start();
