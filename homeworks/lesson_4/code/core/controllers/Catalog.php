<?php

function actionIndex($params = null) {
    $catalog = getModel();
    template_addView('{{content}}', 'catalog', compact('catalog'));
}

