<?php

function actionIndex($params = null) {    
    $catalog = sql_select('catalog', '*', null, null, 'likes DESC, dislikes ASC');    
    templater_addView('{{content}}', 'catalog/catalog', compact('catalog'));
}

function actionProduct($params = null) {
    $id = $params[0];
    $product = sql_selectOne('catalog', '*', 'id = '.$id);
    templater_addView('{{content}}', 'catalog/product', compact('product'));
}