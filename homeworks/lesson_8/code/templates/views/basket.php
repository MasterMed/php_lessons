<?php $summ = 0; ?>
<h2>Корзина</h2>
<div class="container">
    <div class="row gallery__row">
        <?php if (empty($in_cart)): ?>
            <div class="offset-1 col-10"
                <div class="alert alert-success" role="alert">
                    Ваша корзина всё еще пуста!
                </div>
            </div>
        <?php else: ?>
            <div class="col-7 text-center font-weight-bold">Товар</div>
            <div class="col-1 text-center font-weight-bold">Количество</div>
            <div class="col-2 text-center font-weight-bold">Цена</div>
            <div class="col-2 text-center font-weight-bold">Сумма</div>
            <?php foreach($in_cart as $product): ?>
            <div class="col-3">
                 <img src="/upload/images/goods/<?= $product['image']; ?>" class="img-fluid rounded">
            </div>
            <div class="col-4"><?= $product['name']; ?></div>
            <div class="col-1 text-right"><?= $product['quantity']; ?></div>
            <div class="col-2 text-right"><?= $product['price']; ?>₽</div>
            <div class="col-2 text-right"><?= ($product['quantity'] * $product['price']); ?>₽</div>
            <?php $summ = $summ + ($product['quantity'] * $product['price']); ?>
            <?php endforeach; ?>  
            <div class="offset-10 col-2 text-right font-weight-bold"><?= $summ; ?>₽</div>
    </div>
    <div class="row gallery__row">
        <div class="offset-3 col-6">
            <button class="btn btn-success" id="checkout">Оформить заказ</button>
        </div>           
        <?php endif; ?>    
    </div>
</div>
