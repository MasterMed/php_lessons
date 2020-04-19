<?php

function actionIndex($params = null) {
    $gallery = getModel();
    template_addView('{{content}}', 'gallery/gallery', compact('gallery'));
}

function actionUpload($params = null) {
    
    $message = false;
    if (isset($_POST['load'])) {
        $gallery = getModel();
        $nextName = count($gallery) + 1;
        include LIBS . 'classSimpleImage.php';
        $image = new SimpleImage();
        $image->load($_FILES['myfile']['tmp_name']);
        $image->resizeToWidth(800);
        $image->save(UPLOAD_DIR.'images/big/'.$nextName.'.'.$image->extention);
        $image->resizeToWidth(150);
        $image->save(UPLOAD_DIR.'images/small/'.$nextName.'.'.$image->extention);
        //$image->output();
        $message = true;
    }

    template_addView('{{content}}', 'gallery/form', compact('message'));
}
