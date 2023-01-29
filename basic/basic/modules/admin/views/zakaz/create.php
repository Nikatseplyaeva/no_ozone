<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Zakaz $model */

$this->title = 'Добавить заказ';
$this->params['breadcrumbs'][] = ['label' => 'Zakazs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zakaz-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
