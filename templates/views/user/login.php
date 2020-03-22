<?php
$display = (count($errors) > 0) ? '' : ' display_none';
?>
<div class="container">
    <div class="row gallery__row<?= $display; ?>">
        <div class="col-10 offset-1">
            <div class="alert alert-danger" role="alert"> 
                <?php foreach ($errors as $error): ?>
                    <?= $error; ?><br>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="row gallery__row">
        <div class="col-6 offset-3">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="exampleUserName">Имя пользователя</label>
                    <input type="text" name="username" class="form-control" id="exampleUserName" aria-describedby="emailHelp" placeholder="Enter username">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>            
                <button type="submit" name="login" class="btn btn-primary">Войти</button>
            </form>            
        </div>
    </div>
    <div class="row gallery__row">
        <div class="col-6 offset-3">
            <a href="/user/register/">Регистрация</a>
        </div>
    </div>
</div>
