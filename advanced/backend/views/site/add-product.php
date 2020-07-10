<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\Category;
use backend\models\Brand;
use backend\models\Status;
use yii\helpers\ArrayHelper;

$this->title = 'Добавить товар';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-add-product">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-add-product'],['options' => ['enctype' => 'multipart/form-data']]) ?>

            <?= $form->field($model, 'title')->textInput(['autofocus' => true])->label('Наименование') ?>

            <?= $form->field($model, 'descript')->textarea()->label('Описание') ?>

            <?php
            $category = Category::find()->all();
            $itemsC = ArrayHelper::map($category,'id_category','name_category');
            $paramsC = [
                'prompt' => 'Выберите категорию товара'
            ]; ?>
            <?= $form->field($model, 'category')->dropDownList($itemsC,$paramsC)->label('Категория товара') ?>

            <?php
            $brand = Brand::find()->all();
            $itemsB = ArrayHelper::map($brand,'id_brand','brand_name');
            $paramsB = [
                'prompt' => 'Выберите брэнд товара'
            ]; ?>
            <?= $form->field($model, 'brand')->dropDownList($itemsB,$paramsB)->label('Брэнд товара') ?>

            <?= $form->field($model, 'count')->textInput(['type' => 'number'])->label('Количество') ?>

            <?= $form->field($model, 'price')->textInput(['type' => 'number'])->label('Цена') ?>

            <?php
            $status = Status::find()->all();
            $itemsS = ArrayHelper::map($status,'id_status','name_status');
            $paramsS = [
                'prompt' => 'Выберите статус товара'
            ]; ?>
            <?= $form->field($model, 'status')->dropDownList($itemsS,$paramsS)->label('Статус товара') ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'add-product-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
