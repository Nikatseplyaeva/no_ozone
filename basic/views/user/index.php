<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use app\controllers\UserController;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Yii::$app->user->identity->role == 1) {
            echo Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']);
        } ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'login',
            'password',
            'email:email',
            'phone',
            'id_city',
            'valuta',
            'date_of_birth',
            'sex',
            'id_bank_card',
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
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
