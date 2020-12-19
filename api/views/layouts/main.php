<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl'   => Yii::$app->homeUrl,
        'options'    => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items'   => [
            ['label' => Yii::t('app', 'Menu'), 'url' => ['/menu/index']],
            ['label' => Yii::t('app', 'Dictionary Meta'), 'url' => ['/dictionary-meta/index']],
            ['label' => Yii::t('app', 'Dictionary Category'), 'url' => ['/dictionary-category/index']],
            ['label' => Yii::t('app', 'Service'), 'url' => ['/service/index']],
            ['label' => Yii::t('app', 'Process'), 'url' => ['/process/index']],
            Yii::$app->user->isGuest ? (
            ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; igm26k <?= date('Y') ?></p>

        <p class="pull-right">Author: <a href="mailto:i.golubev@igm26k.ru">Ilya Golubev</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
