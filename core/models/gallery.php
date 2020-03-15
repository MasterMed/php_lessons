<?php

$return = array();
if ($handle = opendir(UPLOAD_DIR.'images/small')) {
    while (false !== ($file = readdir($handle))) { 
        if ($file != "." && $file != "..") { 
            $return[] = $file;
        } 
    }
    closedir($handle); 
}

return $return;