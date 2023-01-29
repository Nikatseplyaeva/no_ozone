<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Company $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_image')->fileInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>
    
    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
