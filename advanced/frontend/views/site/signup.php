<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для регистрации:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Имя пользователя') ?>

            <?= $form->field($model, 'firstname')->textInput()->label('Имя') ?>

            <?= $form->field($model, 'lastname')->textInput()->label('Фамилия') ?>

            <?= $form->field($model, 'sex')->radioList([
                'Ж' => 'Женский',
                'М' => 'Мужской'
            ])->label('Пол') ?>

            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+7 (999) 999 99 99',
            ])->label('Телефон') ?>

                <?= $form->field($model, 'email')->label('E-mail') ?>

                <?= $form->field($model, 'password')->passwordInput()->hint('Длина пароля должна быть не меньше 6 символов.')->label('Пароль') ?>

                <div class="form-group">
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
