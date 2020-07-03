
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">

            <?php

            foreach ($firstImg as $firstImg)

            ?>

            <div class="carousel-item active">

                <img class="d-block w-100" src="public/img/<?= $firstImg['id_product'] ?>/<?= $firstImg['name_image'] ?>" alt="<?= $firstImg['name_image'] ?>">

            </div>

                <?php

                foreach ($nextImg as $nextImg) { ?>

            <div class="carousel-item">

                    <img class="d-block w-100" src="public/img/<?= $firstImg['id_product'] ?>/<?= $nextImg['name_image'] ?>" alt="<?= $nextImg['name_image'] ?>">

            </div>

                    <?php
                }

                ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

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
    <p class="text-justify"><?= $product["descript"] ?></p>
    <p class="text-primary"><?= $product["price"] ?>&#36;</p>
    <?php
    if ($_SESSION['id_role'] == '2') {
    ?>
    <a class="btn btn-outline-primary material-icons" title="Редактировать" href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>">edit</a>
    <a class="btn btn-outline-info material-icons" title="Копировать" href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>&step=copy">content_copy</a>
    <a class="btn btn-outline-danger material-icons" title="Удалить" href="index.php?c=page&act=delete&id=<?= $product["id_product"] ?>">delete</a>
    <?php } else { ?>

        <div class="d-flex align-bottom justify-content-around flex-wrap">
            <a class="btn btn-outline-success material-icons" title="Добавить в корзину"
               href="index.php?c=page&act=edit&id=<?= $product["id_product"] ?>">add_shopping_cart</a>
        </div>

        <?php
    } ?>
</div>