<?php

if(!function_exists('redirect')) {
    function redirect($route = null) {
        if(is_null($route)) {
            $link = '/';
        } else {
            $link = '/'.$route.'/';
        }
        header('Location: '.$link);
    }
}
