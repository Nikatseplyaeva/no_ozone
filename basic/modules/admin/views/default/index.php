<?php

use app\modules\admin\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\CategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Административная панель';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Адрес', ['/admin/address']) ?><br/>
        <?= Html::a('Банковская карта', ['/admin/bank-card']) ?><br/>
        <?= Html::a('Корзина', ['/admin/busket']) ?><br/>
        <?= Html::a('Категории', ['/admin/category']) ?><br/>
        <?= Html::a('Город', ['/admin/city']) ?><br/>
        <?= Html::a('Компания', ['/admin/company']) ?><br/>
        <?= Html::a('Избранное', ['/admin/favourite']) ?><br/>
        <?= Html::a('Изображение', ['/admin/image']) ?><br/>
        <?= Html::a('Товар', ['/admin/product']) ?><br/>
        <?= Html::a('Отзыв', ['/admin/review']) ?><br/>
        <?= Html::a('Адрес', ['/admin/address']) ?><br/>
        <?= Html::a('Пользователь', ['/user']) ?><br/>
        <?= Html::a('Информация о заказе', ['/admin/zakaz-info']) ?><br/>
        <?= Html::a('Заказ', ['/admin/zakaz']) ?>

    </p>




</div>
