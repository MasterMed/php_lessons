<?php

function actionIndex($params = null) {
    $customer_id = userCookie();
    if (AJAX) {
        $customer_id = userCookie();
        $product_id = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['product_id'])));
        $product = sql_selectOne('catalog', '*', " id = '" . $product_id . "'");
        if (!$product) {
            die('error');
        }
        if (isUser()) {
            $user_id = getUserId();
            sql_updateOne('basket', "user_id = '" . $user_id . "'", " cookie_id = '" . $customer_id . "'");
            $in_cart = sql_selectOne('basket', '*', " product_id = '" . $product['id'] . "' AND user_id = '" . $user_id . "' AND status = 0");
        } else {
            $in_cart = sql_selectOne('basket', '*', " product_id = '" . $product['id'] . "' AND cookie_id = '" . $customer_id . "' AND status = 0");
        }

        if ($in_cart) {
            sql_updateOne('basket', "quantity = quantity + 1, price = '" . $product['price'] . "'", " id = '" . $in_cart['id'] . "'");
        } else {
            $rows = array();
            $rows['cookie_id'] = $customer_id;
            if (isUser()) {
                $rows['user_id'] = getUserId();
            }
            $rows['product_id'] = $product['id'];
            $rows['price'] = $product['price'];
            sql_insert('basket', $rows);
        }
        echo 'OK';
        exit();
    }
    $in_cart = array();
    if (isUser()) {
        $user_id = getUserId();
        sql_updateOne('basket', "user_id = '" . $user_id . "'", " cookie_id = '" . $customer_id . "'");
        $in_cart = sql_query("SELECT `bs`.*, `cat`.* FROM `basket` `bs` INNER JOIN `catalog` `cat` ON `cat`.`id` = `bs`.`product_id` WHERE `bs`.`user_id` = '" . $user_id . "' AND status = 0");
    } else {
        $in_cart = sql_select("SELECT `bs`.*, `cat`.* FROM `basket` `bs` INNER JOIN `catalog` `cat` ON `cat`.`id` = `bs`.`product_id` WHERE `bs`.`cookie_id` = " . $customer_id . "' AND status = 0");
    }
    templater_addView('{{content}}', 'basket', compact('in_cart'));
}
