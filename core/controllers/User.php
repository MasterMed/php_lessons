<?php

function actionLogin($params = null) {
    $errors = array();
    if(isset($_POST['login'])) {
        $username = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['username'])));              
        $user = sql_selectOne('users', '*', "username = '".$username."'");
        if(is_null($user) OR !password_verify($_POST['password'], $user['password_hash'])) {
            $errors[] = 'Не верно имя пользователя или пароль';            
        }
        if(empty($errors)) {            
            $_SESSION['user'] = $user;
            redirect();  
            exit();
        }       
    }   
    templater_addView('{{content}}', 'user/login', compact('errors'));
}

function actionLogout($params = null) {    
    session_destroy();    
    redirect();
    exit();
}

function actionRegister($params = null) {
    $errors = array();
    if(isset($_POST['register'])) {
        $arr['username'] = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['username'])));
        $arr['email'] = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['email'])));
        $password = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['password'])));
        $confirmpass = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['confirmpass'])));
        
        $user = sql_selectOne('users', 'username, email', "username = '".$arr['username']."'");
        if($user) {
            $errors[] = 'Пользователь с таким именем уже существует';
        }        
        if($password !== $confirmpass) {
            $errors[] = 'Введенные пароли не совпадают.';
        }
        preg_match("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $arr['email'], $matches);
        if(!isset($matches[1])) {
            $errors[] = 'Не верный формат e-mail.';
        }
        if(empty($errors)) {
            $arr['password_hash'] = password_hash($password, PASSWORD_DEFAULT);
            $insert_id = sql_insert('users', $arr);
            if(!$insert_id) {
                $errors[] = 'Произошла ошибка.';
            }
        }
        if(empty($errors)) {
           redirect('user/login'); 
           exit();
        }        
    }    
    templater_addView('{{content}}', 'user/register', compact('errors'));
}