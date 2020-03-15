<?php


function actionIndex($params = null) {
    $name = "Гость";

    templater_addView('{{content}}', 'main', compact('name'));
}