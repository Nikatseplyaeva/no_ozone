<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Zakaz $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="zakaz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $user = app\modules\admin\models\User::find()->all(); 
        $items = ArrayHelper::map($user,'id','name');
        $params = [
            'prompt' => 'Выберите пользователя'
        ];
        echo $form->field($model, 'id_user')->dropDownList($items,$params);
    ?>

    <?php
        $product = app\modules\admin\models\Product::find()->all(); 
        $items = ArrayHelper::map($product,'id','name');
        $params = [
            'prompt' => 'Выберите товар'
        ];
        echo $form->field($model, 'id_user')->dropDownList($items,$params);
    ?>
    <?= $form->field($model, 'sum_zakaz')->textInput() ?>

    <?= $form->field($model, 'sum_sale')->textInput() ?>

    <?php
        $zakaz_info = app\modules\admin\models\ZakazInfo::find()->all(); 
        $items = ArrayHelper::map($zakaz_info,'id','name');
        $params = [
            'prompt' => 'Выберите информацию о заказе'
        ];
        echo $form->field($model, 'id_zakaz_info')->dropDownList($items,$params);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
