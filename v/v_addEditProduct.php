<?php

if ($product['id_product'] AND $_GET['step'] == 'copy') {

    ?>

    <form action="index.php?c=page&act=copy" method="post" id="form">
        <div class="form-row ml-3 mr-3">

            <div class="col-md-6">
                <label for="InputTitleProd">Наименование</label>
                <input type="text" class="form-control" name="title" id="InputTitleProd" value="<?= $product['title'] ?>">
                <small id="InputTitleProd" class="form-text text-muted">Введите наименование товара</small>
            </div>

            <div class="col-md-6">
                <label for="InputDescProd">Описание</label>
                <textarea class="form-control" name="descript" id="InputDescProd" cols="30" rows="5"><?= $product['descript'] ?></textarea>
                <small id="InputDescProd" class="form-text text-muted">Описание товара</small>
            </div>

            <div class="col-md-6">
                <label for="InputCategoryProd">Категория</label>
                <select name="id_category" id="InputCategoryProd" class="custom-select">
                    <option value="<?= $categoryEdit['id_category'] ?>" selected><?= $categoryEdit['name_category'] ?></option>

                    <?php
                    if (isset($category)) {
                        foreach ($category as $category) {
                            ?>
                            <option value="<?= $category['id_category'] ?>"><?= $category['name_category'] ?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
                <small id="InputCategoryProd" class="form-text text-muted">Выберите категорию товара</small>
            </div>

            <div class="col-md-6">
                <label for="InputBrandProd">Брэнд</label>
                <select name="id_brand" id="InputBrandProd" class="custom-select">
                    <option value="<?= $brandEdit['id_brand'] ?>" selected><?= $brandEdit['brand_name'] ?></option>

                    <?php
                    if (isset($brand)) {
                        foreach ($brand as $brand) {
                            ?>
                            <option value="<?= $brand['id_brand'] ?>"><?= $brand['brand_name'] ?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
                <small id="InputBrandProd" class="form-text text-muted">Укажите брэнд товара</small>
            </div>

            <div class="col-md-6">
                <label for="InputCountProd">Количество</label>
                <input type="number" name="count" class="form-control" id="InputCountProd" value="<?= $product['count'] ?>">
                <small id="InputCountProd" class="form-text text-muted">Укажите имеющееся количество товара</small>
            </div>
            <div class="col-md-6">
                <label for="InputPriceProd">Цена</label>
                <input type="number" name="price" class="form-control" id="InputPriceProd" value="<?= $product['price'] ?>">
                <small id="InputPriceProd" class="form-text text-muted">Укажите цену товара</small>
            </div>
            <div class="col-md-6">
                <label for="InputStatusProd">Статус</label>
                <select name="id_status" id="InputStatusProd" class="custom-select">
                    <option value="<?= $statusEdit['id_status'] ?>" selected><?= $statusEdit['name_status'] ?></option>

                    <?php
                    if (isset($status)) {
                        foreach ($status as $status) {
                            ?>
                            <option value="<?= $status['id_status'] ?>"><?= $status['name_status'] ?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
                <small id="InputStatusProd" class="form-text text-muted">Укажите статус товара</small>
            </div>
            <div class="col-md-6">
                <label for="InputFileProd">Выберите файл...</label>
                <input type="file" name="image" class="form-control-file" id="InputFileProd">
                <small id="InputFileProd" class="form-text text-muted">Прикрепите изображения к карточке товара</small>
            </div>

        </div>
        <div class="d-flex justify-content-end ml-3 mr-3">
            <input type="submit" name="button" class="btn btn-success form-control mt-3 mb-3 col-3" value="Сохранить">
        </div>

    </form>

    <?php

} else if ($product['id_product']) {

    ?>

    <form action="index.php?c=page&act=save" method="post" id="form">
        <div class="form-row ml-3 mr-3">

            <div class="col-md-6">
                <label for="InputTitleProd">Наименование</label>
                <input type="text" class="form-control" name="title" id="InputTitleProd" value="<?= $product['title'] ?>">
                <small id="InputTitleProd" class="form-text text-muted">Введите наименование товара</small>
            </div>

            <div class="col-md-6">
                <label for="InputDescProd">Описание</label>
                <textarea class="form-control" name="descript" id="InputDescProd" cols="30" rows="5"><?= $product['descript'] ?></textarea>
                <small id="InputDescProd" class="form-text text-muted">Описание товара</small>
            </div>

            <div class="col-md-6">
                <label for="InputCategoryProd">Категория</label>
                <select name="id_category" id="InputCategoryProd" class="custom-select">
                    <option value="<?= $categoryEdit['id_category'] ?>" selected><?= $categoryEdit['name_category'] ?></option>

                    <?php
                    if (isset($category)) {
                        foreach ($category as $category) {
                            ?>
                            <option value="<?= $category['id_category'] ?>"><?= $category['name_category'] ?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
                <small id="InputCategoryProd" class="form-text text-muted">Выберите категорию товара</small>
            </div>

            <div class="col-md-6">
                <label for="InputBrandProd">Брэнд</label>
                <select name="id_brand" id="InputBrandProd" class="custom-select">
                    <option value="<?= $brandEdit['id_brand'] ?>" selected><?= $brandEdit['brand_name'] ?></option>

                    <?php
                    if (isset($brand)) {
                        foreach ($brand as $brand) {
                            ?>
                            <option value="<?= $brand['id_brand'] ?>"><?= $brand['brand_name'] ?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
                <small id="InputBrandProd" class="form-text text-muted">Укажите брэнд товара</small>
            </div>

            <div class="col-md-6">
                <label for="InputCountProd">Количество</label>
                <input type="number" name="count" class="form-control" id="InputCountProd" value="<?= $product['count'] ?>">
                <small id="InputCountProd" class="form-text text-muted">Укажите имеющееся количество товара</small>
            </div>
            <div class="col-md-6">
                <label for="InputPriceProd">Цена</label>
                <input type="number" name="price" class="form-control" id="InputPriceProd" value="<?= $product['price'] ?>">
                <small id="InputPriceProd" class="form-text text-muted">Укажите цену товара</small>
            </div>
            <div class="col-md-6">
                <label for="InputStatusProd">Статус</label>
                <select name="id_status" id="InputStatusProd" class="custom-select">
                    <option value="<?= $statusEdit['id_status'] ?>" selected><?= $statusEdit['name_status'] ?></option>

                    <?php
                    if (isset($status)) {
                        foreach ($status as $status) {
                            ?>
                            <option value="<?= $status['id_status'] ?>"><?= $status['name_status'] ?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
                <small id="InputStatusProd" class="form-text text-muted">Укажите статус товара</small>
            </div>
            <div class="col-md-6">
                <label for="InputFileProd">Выберите файл...</label>
                <input type="file" name="image" class="form-control-file" id="InputFileProd">
                <small id="InputFileProd" class="form-text text-muted">Прикрепите изображения к карточке товара</small>
            </div>

        </div>
        <div class="d-flex justify-content-end ml-3 mr-3">
            <input type="hidden" name="id_product" value="<?= $product['id_product'] ?>">
            <input type="submit" name="button" class="btn btn-success form-control mt-3 mb-3 col-3" value="Сохранить">
        </div>

    </form>

    <?php

} else {

    ?>

    <form action="index.php?c=page&act=save" method="post" id="form">
        <div class="form-row ml-3 mr-3">

            <div class="col-md-6">
                <label for="InputTitleProd">Наименование</label>
                <input type="text" class="form-control" name="title" id="InputTitleProd">
                <small id="InputTitleProd" class="form-text text-muted">Введите наименование товара</small>
            </div>

            <div class="col-md-6">
                <label for="InputDescProd">Описание</label>
                <textarea class="form-control" name="descript" id="InputDescProd" cols="30" rows="5"></textarea>
                <small id="InputDescProd" class="form-text text-muted">Описание товара</small>
            </div>

            <div class="col-md-6">
                <label for="InputCategoryProd">Категория</label>
                <select name="id_category" id="InputCategoryProd" class="custom-select">
                    <option selected>Выбрать...</option>

                    <?php
                    if (isset($category)) {
                        foreach ($category as $category) {
                            ?>
                            <option value="<?= $category['id_category'] ?>"><?= $category['name_category'] ?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
                <small id="InputCategoryProd" class="form-text text-muted">Выберите категорию товара</small>
            </div>

            <div class="col-md-6">
                <label for="InputBrandProd">Брэнд</label>
                <select name="id_brand" id="InputBrandProd" class="custom-select">
                    <option selected>Выбрать...</option>

                    <?php
                    if (isset($brand)) {
                        foreach ($brand as $brand) {
                            ?>
                            <option value="<?= $brand['id_brand'] ?>"><?= $brand['brand_name'] ?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
                <small id="InputBrandProd" class="form-text text-muted">Укажите брэнд товара</small>
            </div>

            <div class="col-md-6">
                <label for="InputCountProd">Количество</label>
                <input type="number" name="count" class="form-control" id="InputCountProd">
                <small id="InputCountProd" class="form-text text-muted">Укажите имеющееся количество товара</small>
            </div>
            <div class="col-md-6">
                <label for="InputPriceProd">Цена</label>
                <input type="number" name="price" class="form-control" id="InputPriceProd">
                <small id="InputPriceProd" class="form-text text-muted">Укажите цену товара</small>
            </div>
            <div class="col-md-6">
                <label for="InputStatusProd">Статус</label>
                <select name="id_status" id="InputStatusProd" class="custom-select">
                    <option selected>Выбрать...</option>

                    <?php
                    if (isset($status)) {
                        foreach ($status as $status) {
                            ?>
                            <option value="<?= $status['id_status'] ?>"><?= $status['name_status'] ?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
                <small id="InputStatusProd" class="form-text text-muted">Укажите статус товара</small>
            </div>
            <div class="col-md-6">
                <label for="InputFileProd">Выберите файл...</label>
                <input type="file" name="image" class="form-control-file" id="InputFileProd">
                <small id="InputFileProd" class="form-text text-muted">Прикрепите изображения к карточке товара</small>
            </div>

        </div>
        <div class="d-flex justify-content-end ml-3 mr-3">
            <input type="submit" name="button" class="btn btn-success form-control mt-3 mb-3 col-3" value="Сохранить">
        </div>

    </form>

    <?php
}
?>