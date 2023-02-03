<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Busket $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="busket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $product = app\modules\admin\models\Product::find()->all(); 
        $items = ArrayHelper::map($product,'id','name');
        $params = [
            'prompt' => 'Выберите товар'
        ];
        echo $form->field($model, 'id_product')->dropDownList($items,$params);
    ?>

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
