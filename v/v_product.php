
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <img src="https://imgholder.ru/600x600/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson"
         alt="imgHolder">
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3><?= $product["title"] ?></h3>
    <p class="text-secondary mb-0">Брэнд: <?= $product["brand_name"] ?></p>
    <p class="text-secondary mb-0">Категория: <?= $product["name_category"] ?></p>
    <p class="text-secondary">Количество: <?= $product["count"] ?></p>
    <p class="text-secondary
    <?php if ($product['name_status'] == 'Продается') { ?>
        text-success
        <?php } else if ($product['name_status'] == 'Не продается') { ?>
        text-danger
        <?php } else if ($product['name_status'] == 'В пути') { ?>
        text-primary
        <?php } else { ?>
        text-warning
        <?php } ?>
        "> 
        <?= $product["name_status"] ?>
    </p>
    <span><?= $product["descript"] ?></span>
    <p class="text-primary"><?= $product["price"] ?>&#36;</p>
    <?php
    if ($_SESSION['id_role'] == '2') {
    ?>
    <a class="btn btn-primary" href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>">Редактировать</a>
    <a class="btn btn-info" href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>&step=copy">Копировать</a>
    <a class="btn btn-danger" href="index.php?c=page&act=delete&id=<?= $product["id_product"] ?>">Удалить</a>
    <?php } ?>
</div>
