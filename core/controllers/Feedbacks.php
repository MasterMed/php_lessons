<?php

function actionIndex($params = null) {
        
    if($_POST) {
        $row['name'] = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['name'])));
        $row['feedback'] = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['feedback'])));
        sql_insert("feedback", $row);       
    }   
    
    $feedbacks = sql_select("feedback"); 
    if(!is_array($feedbacks)) {
        $feedbacks = array();
    }    
    $action = "/feedbacks/";
    $buttonText = "Отправить";
    
    templater_addView('{{content}}', 'feedback/index', compact('feedbacks','action','buttonText'));
}

function actionEdit($params = null) {
    
    if($_POST) {
        $editId = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['id'])));
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['name'])));
        $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['feedback'])));
        sql_updateOne("feedback", "`name` = '".$name."', `feedback` = '".$feedback."'", "id = ".$editId);       
        header("Location: /feedbacks/");
        exit();
    }   
    
    $editId = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$params[0])));
    $row = sql_selectOne("feedback", "*", "id = ".$editId); 
    $feedbacks = array();
    $action = "/feedbacks/edit/";
    $buttonText = "Изменить";
    
    templater_addView('{{content}}', 'feedback/index', compact('feedbacks','action','buttonText','row'));
}
