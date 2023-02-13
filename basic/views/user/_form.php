<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use app\models\User;
use app\models\RegForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?php
        $city = app\modules\admin\models\City::find()->all(); 
        $items = ArrayHelper::map($city,'id','name');
        $params = [
            'prompt' => 'Выберите город'
        ];
        echo $form->field($model, 'id_city')->dropDownList($items,$params);
    ?>

    <?php
        $items = [
            'RUB' => 'RUB',
            'EUR' => 'EUR',
            'USD'=>'USD'
        ];
        $params = [
            'prompt' => 'Выберите валюту'
        ];
        echo $form->field($model, 'valuta')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'date_of_birth')->textInput(['maxlength' => true]) ?>

    <?php
        $items = [
            '0' => 'Женский',
            '1' => 'Мужской'
        ];
        $params = [
            'prompt' => 'Выберите пол'
        ];
        echo $form->field($model, 'sex')->dropDownList($items,$params);
    ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?php
        $bankcard = app\modules\admin\models\BankCard::find()->all(); 
        $items = ArrayHelper::map($bankcard,'id','number');
        $params = [
            'prompt' => 'Выберите карту'
        ];
        echo $form->field($model, 'id_bank_card')->dropDownList($items,$params);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
