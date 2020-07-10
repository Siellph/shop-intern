<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = 'Регистрация нового администратора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-add-admin">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для регистрации нового администратора:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-add-admin']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Имя пользователя') ?>

            <?= $form->field($model, 'firstname')->textInput()->label('Имя') ?>

            <?= $form->field($model, 'lastname')->textInput()->label('Фамилия') ?>

            <?= $form->field($model, 'sex')->radioList([
                'Ж' => 'Женский',
                'М' => 'Мужской'
            ])->label('Пол') ?>

            <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
                'mask' => '+7 (999) 999 99 99',
            ])->label('Телефон') ?>

            <?= $form->field($model, 'email')->label('E-mail') ?>

            <?= $form->field($model, 'password')->passwordInput()->hint('Длина пароля должна быть не меньше 6 символов.')->label('Пароль') ?>

            <?= $form->field($model, 'status')->hiddenInput(['value' => 10])->label('') ?>

            <?= $form->field($model, 'id_role')->hiddenInput(['value' => 2])->label('') ?>

            <div class="form-group">
                <?= Html::submitButton('Зарегистрировать', ['class' => 'btn btn-primary', 'name' => 'add-admin-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
