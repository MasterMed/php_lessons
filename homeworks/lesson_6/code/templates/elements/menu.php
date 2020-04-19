<ul class="<?= $class['wraper']; ?>"<?= $level > 0 ? ' aria-labelledby="'.$dropdownId.'"' : ''; ?>>
    <?php if($level > 1) {
       $dropdownId .= '-'; 
    } ?>
    <?php foreach($menu as $item): ?>
    <?php
        $idCounter = 0;
        $link = isset($item['url']) ? ' href="'.$item['url'].'"' : '';
        $dropdown = isset($item['menu']) ? ' dropdown' : '';
        $dropdownToogle = isset($item['menu']) ? ' dropdown-toggle' : '';
        $dropdowmAttr = '';
        if(isset($item['menu'])) {
            $idCounter++;
            $dropdownId .= $idCounter;
            $dropdowmAttr = ' id="'.$dropdownId.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
        }        
    ?>
    <li class="<?= $class['menu_item']; ?><?= $dropdown; ?>">
        <a class="<?= $class['menu_link']; ?><?= $dropdownToogle; ?>"<?= $link; ?><?= $dropdowmAttr; ?>><?= $item['label']; ?></a>
        <?php if(isset($item['menu'])): ?>
        <?= menu_render($item['menu'], $dropdownId, $level); ?>
        <?php endif; ?>
    </li>    
    <?php endforeach; ?>
</ul>
