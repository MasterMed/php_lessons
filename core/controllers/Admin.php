<?php

if(!isAdmin()) {
    redirect('user/login');
    exit();
}

function actionIndex($params = null) {
    
}
