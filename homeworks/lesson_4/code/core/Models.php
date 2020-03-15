<?php

define('MODELS', CORE.'models/');

function model($action = null, $modelName = null) {
    static $model = '';
    switch ($action) {
        case 'set':
            $model = $modelName.'.php';
            break;
        case 'get':
            if(file_exists(MODELS.$modelName.'.php')) {
                return include MODELS.$modelName.'.php';
            } 
            break;
        default:
            if(file_exists(MODELS.$model)) {
                return include MODELS.$model;
            }            
    }
}

function setModel($modelName) {
    model('set', $modelName);
}

function getModel($modelName = null) {
    if($modelName) {
        return model('get', $modelName);
    } else {
        return model();
    }   
}