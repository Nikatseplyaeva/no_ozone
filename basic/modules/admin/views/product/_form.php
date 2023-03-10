<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'price_sale')->textInput() ?>

    <?= $form->field($model, 'flag')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'characrteristic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mode_of_application')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'created_at')->textInput() ?>
    
    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?php
        $company = app\modules\admin\models\Company::find()->all(); 
        $items = ArrayHelper::map($company,'id','name');
        $params = [
            'prompt' => 'Выберите компанию'
        ];
        echo $form->field($model, 'id_company')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?php
        $user = app\models\User::find()->all(); 
        $items = ArrayHelper::map($user,'id','name');
        $params = [
            'prompt' => 'Выберите пользователя'
        ];
        echo $form->field($model, 'created_by')->dropDownList($items,$params);
    ?>

    <?php
        $category = app\modules\admin\models\Category::find()->all(); 
        $items = ArrayHelper::map($category,'id','name');
        $params = [
            'prompt' => 'Выберите категорию'
        ];
        echo $form->field($model, 'id_category')->dropDownList($items,$params);
    ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
