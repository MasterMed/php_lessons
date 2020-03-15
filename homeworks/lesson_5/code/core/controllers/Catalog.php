<?php

function actionIndex($params = null) {
    $catalog = include getModel();
    templater_addView('{{content}}', 'catalog', compact('catalog'));
}

