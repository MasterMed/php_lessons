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
                    <input type="text" name="username" class="form-control" id="exampleUserName" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Повторите пароль</label>
                    <input type="password" name="confirmpass" class="form-control" id="exampleInputPassword2" placeholder="Password">
                </div>
                <button type="submit" name="register" class="btn btn-primary">Зарегистрироваться</button>
            </form>     
        </div>
    </div>
</div>