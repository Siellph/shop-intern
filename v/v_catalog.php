<div class="col-lg-4 col-md-4 d-none d-md-block d-lg-block">Фильтр</div>
<div class="col">
    <div class="row justify-content-center">


<?php
if (isset($catalog)) {
foreach ($catalog as $product) { ?>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <a class="text-primary text-center text-decoration-none" href="index.php?c=page&act=product&id=<?= $product["id_product"] ?>">
        <h3><?= $product["title"] ?></h3>
    </a>
    <img src="https://imgholder.ru/600x600/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson"
         alt="imgHolder">
    <p class="text-secondary mb-0">Брэнд: <?= $product["brand_name"] ?></p>
    <p class="text-secondary mb-0">Категория: <?= $product["name_category"] ?></p>
    <p class="text-secondary mb-0"><small>Количество: <?= $product["count"] ?></small></p>
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
        <small>
            <?= $product["name_status"] ?>
        </small>
    </p>
    <p class="text-primary"><?= $product["price"] ?>&#36;</p>
    <?php
    if ($_SESSION['id_role'] == 2) {
        ?>
        <div class="d-flex justify-content-between flex-wrap">
            <a class="btn btn-primary mt-2" href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>">Редактировать</a>
            <a class="btn btn-info mt-2" href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>&step=copy">Копировать</a>
            <a class="btn btn-danger mt-2" href="index.php?c=page&act=delete&id=<?= $product["id_product"] ?>">Удалить</a>
        </div>
        <?php
    }
        ?>
</div>
    <?php
}
}
?>
