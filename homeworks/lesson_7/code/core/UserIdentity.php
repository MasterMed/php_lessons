<?php

function isUser() {
    if(isset($_SESSION['user'])) {
        return true;
    }
    return false;
}

function isAdmin() {
    if(isUser() AND $_SESSION['user']['admin'] == 1) {
        return true;
    }
    return false;
}

function getUserId() {
    if(isUser()) {
        return $_SESSION['user']['id'];
    }
    return null;
}

function getUserName() {
    if(isUser()) {
        return $_SESSION['user']['username'];
    }
    return 'Гость';
}

function userCookie() {
    if(!isset($_COOKIE['customer_id'])) {
        setcookie('customer_id', session_id(), time()+60*60*24*30, '/');
    } else {
        return $_COOKIE['customer_id'];
    }   
}