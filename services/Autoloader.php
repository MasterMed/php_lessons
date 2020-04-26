<?php

class Autoloader 
{

    public function loadClass($className) 
    {
        $file = str_replace(['app\\', '\\'], [realpath('../').'/', '/'], $className).'.php';
        if (file_exists($file)) {            
            include $file;
        }
    }

}
