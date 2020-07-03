<?php
    if (isset($catalog)) {
        foreach ($catalog as $product) { ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 my-2 d-flex justify-content-center flex-wrap">
                <div class="card" style="width: 18rem;">
                    <a href="index.php?c=page&act=product&id=<?= $product["id_product"] ?>">
                        <img class="card-img-top"
                        <?php

                        if ($product['name_image']) {
                            ?>
                            src="public/img/<?= $product['id_product'] ?>/<?= $product['name_image'] ?>" alt="<?= $product['name_image'] ?>"
                            <?php
                        } else { ?>
                            src="https://imgholder.ru/300x300/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson" alt="imgHolder"
                        <?php } ?>
                    ></a>
                    <div class="card-body d-flex flex-wrap align-items-end justify-content-center">
<div class="">
                        <a class="text-dark text-center text-decoration-none card-title"
                           href="index.php?c=page&act=product&id=<?= $product["id_product"] ?>">
                            <h5><?= $product["title"] ?></h5>
                        </a>

                        <p class="card-text text-secondary mb-0">Брэнд: <?= $product["brand_name"] ?></p>
                        <p class="card-text text-secondary mb-0">Категория: <?= $product["name_category"] ?></p>
                        <p class="card-text text-secondary mb-0">
                            <small>Количество: <?= $product["count"] ?></small>
                        </p>
                        <p class="card-text text-secondary
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
                        <p class="card-text text-primary"><?= $product["price"] ?>&#36;</p>


                            <?php
                        if ($_SESSION['id_role'] == 2) {
                            ?>

                            <div class="d-flex align-bottom justify-content-around flex-wrap">
                                <a class="btn btn-outline-primary material-icons" title="Редактировать"
                                   href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>">edit</a>
                                <a class="btn btn-outline-info material-icons" title="Копировать"
                                   href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>&step=copy">content_copy</a>
                                <a class="btn btn-outline-danger material-icons" title="Удалить"
                                   href="index.php?c=page&act=delete&id=<?= $product["id_product"] ?>">delete</a>
                            </div>

                            <?php
                        } else { ?>

                            <div class="d-flex justify-content-around flex-wrap">
                                <a class="btn btn-outline-success material-icons" title="Добавить в корзину"
                                   href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>">add_shopping_cart</a>
                            </div>

                            <?php
                        }
                        ?>
</div>




                    </div>
                </div>
            </div>
            <?php
        }
    }
?>


