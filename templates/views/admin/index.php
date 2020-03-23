<h2>Админпанель</h2>
<div class="container">
    <?php foreach ($orders as $order): ?>
        <div class="row gallery__row">
            <?php $username = $order['username'] ? $order['username'] : 'Не авторизованный пользователь'; ?>
            <?php $status = ($order['status'] == 1) ? 'Оплатил' : 'Выбрал'; ?>
            <div class="col-3"><?= $username; ?></div>
            <div class="col-6"><?= $status ?> <?= $order['quantity']; ?> товаров на сумму <?= $order['summ']; ?>₽</div>
            <div class="col-3"><button class="btn btn-danger deleteFromBase" data-user="<?= $order['cookie_id']; ?>" data-status="<?= $order['status']; ?>">Удалить из базы</button></div>
        </div>
    <?php endforeach; ?>
</div>