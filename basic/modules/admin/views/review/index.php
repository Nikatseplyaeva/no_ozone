<?php

use app\modules\admin\models\Review;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\ReviewSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить отзыв', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'advantage',
            'disadvantage',
            'description:ntext',
            'rating',
            'created_at',
            'updated_at',
            'created_by',
            'id_user',
            'id_product',
            'imageFile',
            [
                'attribute' => 'image',
                'format' => 'html',    
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/uploads/'. $data['imageFile'],
                        ['width' => '70px']);
                },
            ],
            [
                'class' => ActionColumn::className(), 'headerOptions' => ['width' => '60'], 'visible' => $hasAccess,
                'urlCreator' => function ($action, Review $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
