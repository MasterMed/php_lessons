<?php

if(!isAdmin()) {
    redirect('user/login');
    exit();
}

function actionIndex($params = null) {
    $orders = sql_query("SELECT SUM(quantity) as quantity, SUM(quantity*price) as summ, status, user_id, username, cookie_id FROM basket 
    LEFT JOIN users us ON us.id = user_id
    GROUP BY cookie_id, status");
    templater_addView('{{content}}', 'admin/index', compact('orders'));
}
