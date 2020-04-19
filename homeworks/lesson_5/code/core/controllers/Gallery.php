<?php

function actionIndex($params = null) {
    $gallery = sql_select('gallery', '*', null, null, 'views DESC');
    templater_addView('{{content}}', 'gallery/gallery', compact('gallery'));
}

function actionUpload($params = null) {
    
    $message = false;
    $insertId = null;
    if (isset($_POST['load'])) {

        $nextName = sql_selectOne('gallery', 'COUNT(*)')[0];
        $nextName++;
        include LIBS . 'classSimpleImage.php';
        $image = new SimpleImage();
        $image->load($_FILES['myfile']['tmp_name']);
        
        $toDb = array();
        $toDb['name'] = $nextName.'.'.$image->extention;        
        $toDb['small_path'] = '/upload/images/small/';
        $toDb['big_path'] = '/upload/images/big/';
        
        $image->resizeToWidth(800);        
        $image->save(UPLOAD_DIR.'images/big/'.$toDb['name']);
        $toDb['big_size'] = filesize(UPLOAD_DIR.'images/big/'.$toDb['name']);
        
        $image->resizeToWidth(150);        
        $image->save(UPLOAD_DIR.'images/small/'.$toDb['name']);
        $toDb['small_size'] = filesize(UPLOAD_DIR.'images/small/'.$toDb['name']);
        
        $insertId = sql_insert('gallery', $toDb);
        if($insertId) {
            $message = true;
        }
        
    }

    templater_addView('{{content}}', 'gallery/form', compact('message'));
}

function actionImage($params = null) {
    $id = $params[0];
    $image = sql_selectOne('gallery', '*', 'id = '.$id);
    sql_updateOne('gallery', 'views = views + 1', 'id = '.$id);
    templater_addView('{{content}}', 'gallery/image', compact('image'));
}