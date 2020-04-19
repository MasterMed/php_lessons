<h2>Каталог</h2>
<div class="container">
    <div class="row gallery__row">
        <?php $counter = 0; ?>
        <?php foreach ($catalog as $item): ?>
        <?php $counter++; ?>
        <div class="col-md-3">
            <img src="/upload/images/goods/<?= $item['image']; ?>" class="img-fluid rounded" style="max-height: 230px;">        
            <a href="/catalog/product/<?= $item['id']; ?>/" data-toggle="lightbox" data-gallery="gallery" class="col-md-3">
                <?= $item['name']; ?>
            </a><br>
            <b>Цена: <?= $item['price']; ?>₽</b>
            <button class="btn btn-success addtocart" data-product="<?= $item['id']; ?>">Добавить в корзину</button>
        </div>
        <?php if($counter % 4 == 0): ?>
    </div>
</div>
<div class="container">
    <div class="row gallery__row">
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>