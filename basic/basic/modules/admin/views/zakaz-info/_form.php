<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\ZakazInfo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="zakaz-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $address = app\modules\admin\models\Address::find()->all(); 
        $items = ArrayHelper::map($address,'id','name');
        $params = [
            'prompt' => 'Выберите адрес'
        ];
        echo $form->field($model, 'id_address')->dropDownList($items,$params);
    ?>

    <?php
        $bankcard = app\modules\admin\models\BankCard::find()->all(); 
        $items = ArrayHelper::map($bankcard,'id','number');
        $params = [
            'prompt' => 'Выберите карту'
        ];
        echo $form->field($model, 'id_bank_card')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'type_delivery')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
