<div class="container">
    <h2>Отзывы</h2>
    <div class="row gallery__row">       
        <div id="messages">
        <? foreach ($feedbacks as $item): ?>
            <b><?= $item['name']; ?>:</b> <?= $item['feedback']; ?> <a href="/feedbacks/edit/<?= $item['id']; ?>/">[edit]</a> <br>
        <? endforeach; ?>
        </div>
    </div>
    <div class="row gallery__row">  
        <form method="post" id="feedbacks" action="<?= $action; ?>">
            <input class="form-control" hidden type="text" name="id" value="<?= $row['id']; ?>"><br>
            <input class="form-control" placeholder="Имя" type="text" name="name" value="<?= $row['name']; ?>"><br>
            <textarea class="form-control" placeholder="Отзыв" cols="50" rows="6" name="feedback"><?= $row['feedback']; ?></textarea><br>
            <input class="btn btn-primary" type="submit" name="ok" value="<?= $buttonText ?>">
        </form>
    </div>
</div>
