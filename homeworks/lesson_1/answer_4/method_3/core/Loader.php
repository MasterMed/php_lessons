<?php

namespace core;

class Loader {

    public function register() {
        spl_autoload_register(array($this, 'loadClass'), true, true);
    }

    public function loadClass($class) {

        $file = DOCROOT . '/' . str_replace('\\', '/', $class) . '.php';
        if ($this->requireFile($file)) {
            return $file;
        }
        return false;
    }

    protected function requireFile($file) {
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
        return false;
    }

}
