<?php

function templater($renew = null) {
    static $render = null;
    if(is_null($render)) {
        ob_start();
        include TEMPLATES_DIR . 'layouts/main.php';
        $render = ob_get_clean();
    }
    if(is_null($renew)) {
        return $render;
    } 
    $render = $renew;
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
    $replacement = templater_addTemplate('views', $file, $var);
    $tpl = str_replace($shortcode, $replacement, getTemplate());
    templater($tpl);
}

function templater_addElement($shortcode, $file, $var = array()) {
    $replacement = templater_addTemplate('elements', $file, $var);
    $tpl = str_replace($shortcode, $replacement, getTemplate());
    templater($tpl);
}

function templater_show() {
    echo templater();
}