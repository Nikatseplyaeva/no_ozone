<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $items = [];
    if(Yii::$app->user->isGuest) { //вход как гость
        $items[] =  ['label' => 'Главная', 'url' => ['/site/index']];
        $items[] =  ['label' => 'Регистрация', 'url' => ['/user/create']];
        $items[] =  ['label' => 'Вход', 'url' => ['/site/login']];
    } else {
        if(Yii::$app->user->identity->role == 1){ //вход как администратор
            $items[] =  ['label' => 'Главная', 'url' => ['/site/index']];
            $items[] =  ['label' => 'Адрес', 'url' => ['/admin/address']];
            $items[] =  ['label' => 'Банковская карта', 'url' => ['/admin/bank-card']];
            $items[] =  ['label' => 'Корзина', 'url' => ['/admin/busket']];
            $items[] =  ['label' => 'Категории', 'url' => ['/admin/category']];
            $items[] =  ['label' => 'Город', 'url' => ['/admin/city']];
            $items[] =  ['label' => 'Компания', 'url' => ['/admin/company']];
            $items[] =  ['label' => 'Избранное', 'url' => ['/admin/favourite']];
            $items[] =  ['label' => 'Изображение', 'url' => ['/admin/image']];
            $items[] =  ['label' => 'Товар', 'url' => ['/admin/product']];
            $items[] =  ['label' => 'Отзыв', 'url' => ['/admin/review']];
            $items[] =  ['label' => 'Пользователь', 'url' => ['/user']];
            $items[] =  ['label' => 'Информация о заказе', 'url' => ['/admin/zakaz-info']];
            $items[] =  ['label' => 'Заказ', 'url' => ['/admin/zakaz']];
        } else { //вход как пользователь
            $items[] =  ['label' => 'Главная', 'url' => ['/site/index']];
        }
        $items[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->login . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $items,
        /*'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Адрес', 'url' => ['/admin/address']],
            ['label' => 'Банковская карта', 'url' => ['/admin/bank-card']],
            ['label' => 'Корзина', 'url' => ['/admin/busket']],
            ['label' => 'Категории', 'url' => ['/admin/category']],
            ['label' => 'Город', 'url' => ['/admin/city']],
            ['label' => 'Компания', 'url' => ['/admin/company']],
            ['label' => 'Избранное', 'url' => ['/admin/favourite']],
            ['label' => 'Изображение', 'url' => ['/admin/image']],
            ['label' => 'Товар', 'url' => ['/admin/product']],
            ['label' => 'Отзыв', 'url' => ['/admin/review']],
            ['label' => 'Пользователь', 'url' => ['/admin/user']],
            ['label' => 'Информация о заказе', 'url' => ['/admin/zakaz-info']],
            ['label' => 'Заказ', 'url' => ['/admin/zakaz']],
            ['label' => 'Регистрация', 'url' => ['/admin/user/create']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->login . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],*/
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
