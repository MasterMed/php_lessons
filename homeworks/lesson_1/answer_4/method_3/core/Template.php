<?php

namespace core;

class Template {

    public static $viewList = array();
    public static $viewListBlock = array();
    public static $elementsList = array();
    public static $templateName = null;

    public static function printAll($selectTemplate = null) {
        echo static::getTemplate($selectTemplate);
    }

    protected static function getTemplateRootPath() {
        return DOCROOT;
    }

    public static function getTemplate($selectTemplate) {       

        $filepath = static::getTemplateRootPath() . '/tpl/structure/' . $selectTemplate . '.php';

        $tpl = "";

        if (file_exists($filepath)) {
            ob_start();
            require_once $filepath;
            $tpl = ob_get_contents();
            ob_end_clean();
        }

        return static::replaceData($tpl);
    }

    /** replace %% %% */
    private static function replaceData($tpl) {
 
        foreach (static::getElements() as $a => $b) {
            $tpl = str_replace('%%' . $a . '%%', $b, $tpl);
        }

        foreach (static::$viewList as $a => $b) {
            $tpl = str_replace($a, $b, $tpl);
        }

        foreach (static::$elementsList as $a => $b) {
            $tpl = str_replace($a, $b, $tpl);
        }

        return $tpl;
    }

    protected static function getElements() {
        $replacers = array();
        $filepath = static::getTemplateRootPath() . '/tpl/elements/';

        $vars = [
            [
                'name' => 'header',
                'value' => 'header.php'
            ],
            [
                'name' => 'footer',
                'value' => 'footer.php'
            ]
        ];
        
        if (!empty($vars)) {
            foreach ($vars as $locElem) {
                if (file_exists($filepath . $locElem['value'])) {
                    ob_start();
                    require_once $filepath . $locElem['value'];
                    $replacers[$locElem['name']] = ob_get_contents();
                    ob_end_clean();
                }
            }
        }
        return $replacers;
    }

    /** replace template */
    public static function addView($rep, $file, $var = array()) {
        static::$viewList[$rep] = static::tpl('views', $file, $var);
    }

    /** replace element */
    public static function addElement($rep, $file, $var = array()) {
        static::$elementsList[$rep] = static::tpl('elements', $file, $var);
    }

    public static function tpl($path = null, $file = null, $var = null) {
        $filepath = null;
        if (strlen($file) < 50) {
            $filepath = static::getTemplateRootPath() . '/tpl/' . $path . '/' . $file . '.php';
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
            $l = ob_get_contents();
            ob_end_clean();
            return $l;
        } else { //load static presets
            return $file;
        }
    }

}
