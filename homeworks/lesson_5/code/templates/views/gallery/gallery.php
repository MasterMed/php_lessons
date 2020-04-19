<div class="container">
    <div class="row gallery__row">
        <?php $counter = 0; ?>
        <?php foreach ($gallery as $item): ?>
        <?php $counter++; ?>
        <a href="/gallery/image/<?= $item['id']; ?>/" data-toggle="lightbox" data-gallery="gallery" class="col-md-2">
            <img src="<?= $item['small_path'] ?>/<?= $item['name']; ?>" class="img-fluid rounded">
        </a>
        <?php if($counter % 6 == 0): ?>
    </div>
</div>
<div class="container">
    <div class="row gallery__row">
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>