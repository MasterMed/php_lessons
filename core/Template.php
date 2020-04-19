<?php

define('TEMPLATES_DIR', DOCROOT . 'templates/');
define('UPLOAD_DIR', DOCROOT . 'upload/');

function template($action = null, $renew = null) {
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
    return template();
}

function template_addTemplate($path = null, $file = null, $var = null) {    
    $filepath = null;
    if (strlen($file) < 50) {
        $filepath = TEMPLATES_DIR . $path . '/' . $file . '.php';
    }
    if (file_exists($filepath)) {
        if (count($var) > 0) {
            $tpl = array();
            foreach ($var as $a => $b) {
                $tpl[$a] = $b;
                $$a = $b;
            }
        }
        ob_start();
        require $filepath;
        return ob_get_clean();        
    } else { 
        return $file;
    }
}

function template_addView($shortcode, $file, $var = array()) {
    $tpl = getTemplate();
    $replacement = template_addTemplate('views', $file, $var);
    $tpl = str_replace($shortcode, $replacement, $tpl);
    template('renew', $tpl);
}

function template_addElement($shortcode, $file, $var = array()) {
    $template = getTemplate();
    $replacement = template_addTemplate('elements', $file, $var);
    $tpl = str_replace($shortcode, $replacement, $tpl);
    template('renew', $tpl);
}

function template_start() {
    template('start');
}

function template_show() {
    echo template();
}

template_start();
