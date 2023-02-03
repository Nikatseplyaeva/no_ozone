<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use app\models\User;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Review $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'advantage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disadvantage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?php
        $user = app\models\User::find()->all(); 
        $items = ArrayHelper::map($user,'id','name');
        $params = [
            'prompt' => 'Выберите пользователя'
        ];
        echo $form->field($model, 'created_by')->dropDownList($items,$params);
    ?>

    <?php
        $user = app\models\User::find()->all(); 
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
        echo $form->field($model, 'id_product')->dropDownList($items,$params);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
