<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Address $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
        $city = app\modules\admin\models\City::find()->all(); 
        $items = ArrayHelper::map($city,'id','name');
        $params = [
            'prompt' => 'Выберите город'
        ];
        echo $form->field($model, 'id_city')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_comment')->textarea(['rows' => 6]) ?>

    <?php
        $user = app\models\User::find()->all(); 
        $items = ArrayHelper::map($user,'id','name');
        $params = [
            'prompt' => 'Выберите пользователя'
        ];
        echo $form->field($model, 'id_user')->dropDownList($items,$params);
    ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
