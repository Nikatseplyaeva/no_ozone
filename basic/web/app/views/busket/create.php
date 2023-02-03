<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Busket $model */

$this->title = 'Create Busket';
$this->params['breadcrumbs'][] = ['label' => 'Buskets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="busket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
