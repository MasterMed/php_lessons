<?php


function actionIndex($params = null) {
    $name = "Гость";

    template_addView('{{content}}', 'main', compact('name'));
}