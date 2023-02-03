<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Company $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

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

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
