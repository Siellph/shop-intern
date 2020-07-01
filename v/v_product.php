
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
    <?php if ($product['name_status'] == 'Активен') { ?>
        text-success
        <?php } else { ?>
        text-danger
        <?php } ?>
        "> 
        <?= $product["name_status"] ?>
    </p>
    <span><?= $product["descript"] ?></span>
    <p class="text-primary"><?= $product["price"] ?>&#36;</p>
    <?php
    if ($_SESSION['id_role'] == '2') {
    ?>
    <a class="btn btn-outline-primary material-icons" title="Редактировать" href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>">edit</a>
    <a class="btn btn-outline-info material-icons" title="Копировать" href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>&step=copy">content_copy</a>
    <a class="btn btn-outline-danger material-icons" title="Удалить" href="index.php?c=page&act=delete&id=<?= $product["id_product"] ?>">delete</a>
    <?php } ?>
</div>