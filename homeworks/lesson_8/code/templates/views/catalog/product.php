<h2><?= $product['name']; ?></h2>
<div class="container">
    <div class="row gallery__row">
        <div class="col-md-7">
            <img src="/upload/images/goods/<?= $product['image']; ?>" class="img-fluid rounded">
        </div>
        <div class="col-md-5">
            <b class="h4">Цена: <?= $product['price']; ?>₽</b>
            <br><br>
            <button class="btn btn-success addtocart" data-product="<?= $product['id']; ?>">Добавить в корзину</button>
        </div>        
    </div>
    <div class="row gallery__row">
        <?= $product['text']; ?>
    </div>
</div>


