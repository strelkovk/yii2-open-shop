<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php

    NavBar::begin([
        'brandLabel' => 'AdminPanel',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);

    $menuItems = [
        ['label' => Yii::t('backend','nav.home'), 'url' => ['/site/index']],
    ];

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('backend','nav.login'), 'url' => ['/site/login']];
    } else {

        $menuItems[] = [
            'label' => Yii::t('backend','nav.dictionary'),
            'items' =>[
                [
                    'label' => Yii::t('backend','nav.dictionary.translations'),
                    'url' => ['/translate'],
                ],
                [
                    'label' => Yii::t('backend','nav.dictionary.region'),
                    'url' => ['/dictionary/table?name=Regions'],
                ],
            ],
        ];

        $menuItems[] = [
            'label' => Yii::t('backend','nav.tools'),
            'items' =>[
                [
                    'label' => Yii::t('backend','nav.sqlmyadmin'),
                    'url' => ['/phpmyadmin'],
                ],
                [
                    'label' => Yii::t('backend','nav.file.manager'),
                    'url' => ['/site/logout'],
                ]
            ]
        ];

        $menuItems[] = [
            'label' => Yii::t('backend','nav.nurseries'),
            'url' => ['/nurseries'],
        ];

        $menuItems[] = [
            'label' => Yii::t('backeand','nav.logout.{username}', ['username' => Yii::$app->user->identity->username]),
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<script>
    $.ajaxSetup({
        data: <?= \yii\helpers\Json::encode([
            \yii::$app->request->csrfParam => \yii::$app->request->csrfToken,
        ]) ?>
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
