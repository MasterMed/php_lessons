<ul>
    <?php foreach ($menu as $item): ?>
    <li><a href="<?= $item['url']; ?>"><?= $item['label']; ?></a>
        <?php if(isset($item['menu'])): ?>
            <?= renderTemplate('menu', $item); ?>
        <?php endif; ?>
    </li>
    <?php endforeach; ?>
</ul>