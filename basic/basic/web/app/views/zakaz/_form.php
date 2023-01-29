<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Zakaz $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="zakaz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_product')->textInput() ?>

    <?= $form->field($model, 'id_address')->textInput() ?>

    <?= $form->field($model, 'id_bank_card')->textInput() ?>

    <?= $form->field($model, 'type_delivery')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sum_zakaz')->textInput() ?>

    <?= $form->field($model, 'sum_sale')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
