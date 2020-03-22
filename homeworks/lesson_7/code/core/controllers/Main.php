<?php


function actionIndex($params = null) {
    $name = getUserName();
    templater_addView('{{content}}', 'main', compact('name'));
}