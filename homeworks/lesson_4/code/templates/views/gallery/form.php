<?php if ($message): ?>
    <div class="container">
        <div class="row gallery__row">
            <div class="alert alert-success">
                <strong>Успех!</strong> Файл успешно загружен.<br>
                <a href="/gallery/">Перейти в галерею.</a>
            </div>
        </div>
    </div>

<?php endif; ?>

<div class="container">
    <div class="row gallery__row">
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="myfile">
            <input type="submit" value="Загрузить" name="load">
        </form>
    </div>
</div>