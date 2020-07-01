<div class="col-lg-4 col-md-4 d-none d-md-block d-lg-block">Фильтр</div>
<div class="col">
    <div class="row justify-content-center">


<?php
if (isset($catalog)) {
foreach ($catalog as $product) { ?>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
    <a class="text-primary text-center text-decoration-none" href="index.php?c=page&act=product&id=<?= $product["id_product"] ?>">
        <h3><?= $product["title"] ?></h3>
    </a>
    <img src="https://imgholder.ru/600x600/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson"
         alt="imgHolder">
    <p class="text-secondary mb-0">Брэнд: <?= $product["brand_name"] ?></p>
    <p class="text-secondary mb-0">Категория: <?= $product["name_category"] ?></p>
    <p class="text-secondary mb-0"><small>Количество: <?= $product["count"] ?></small></p>
    <p class="text-secondary
    <?php if ($product['name_status'] == 'Активен') { ?>
        text-success
        <?php } else if ($product['name_status'] == 'Неактивен') { ?>
        text-danger
        <?php } else { ?>
        text-primary
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
        <div class="d-flex justify-content-around flex-wrap">
            <a class="btn btn-outline-primary material-icons" title="Редактировать" href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>">edit</a>
            <a class="btn btn-outline-info material-icons" title="Копировать" href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>&step=copy">content_copy</a>
            <a class="btn btn-outline-danger material-icons" title="Удалить" href="index.php?c=page&act=delete&id=<?= $product["id_product"] ?>">delete</a>
        </div>
        <?php
    }
        ?>
</div>
    <?php
}
}
?>
