<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="container">
    <!-- Start Header -->
    <div class="hidden-header"></div>
    <header class="clearfix">
        <!-- Start Top Bar -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Start Contact Info -->
                        <ul class="contact-details">
                            <li><a href="#"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?= Yii::t('view','header.address') ?></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;<?= Yii::t('view','header.email') ?></a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>&nbsp;&nbsp;<?= Yii::t('view','header.phone') ?></a></li>
                        </ul>
                        <!-- End Contact Info -->
                    </div>
                    <div class="col-md-6">
                        <!-- Start Social Links -->
                        <ul class="social-list">
                            <li> <a class="facebook itl-tooltip" data-placement="bottom" title="Facebook" href="#"><i class="fa fa-facebook"></i></a> </li>
                            <li> <a class="twitter itl-tooltip" data-placement="bottom" title="Twitter" href="#"><i class="fa fa-twitter"></i></a> </li>
                            <li> <a class="google itl-tooltip" data-placement="bottom" title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a> </li>
                            <li> <a class="linkdin itl-tooltip" data-placement="bottom" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a> </li>
                            <li> <a class="skype itl-tooltip" data-placement="bottom" title="Skype" href="#"><i class="fa fa-skype"></i></a> </li>
                        </ul>
                        <!-- End Social Links -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Bar -->
        <!-- Start Header ( Logo & Naviagtion ) -->

        <?php


//        function isItemActive($item)
//        {
//            $router = Yii::$app->controller->getRoute();
//
//            if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
//                $route = $item['url'][0];
//                if ($route[0] !== '/' && Yii::$app->controller) {
//                    $route = Yii::$app->controller->module->getUniqueId() . '/' . $route;
//                }
//                if (ltrim($route, '/') !== $router) {
//                    return false;
//                }
//                unset($item['url']['#']);
//                if (count($item['url']) > 1) {
//                    $params = $item['url'];
//                    unset($params[0]);
////                    foreach ($params as $name => $value) {
////                        if ($value !== null && (!isset($this->params[$name]) || $this->params[$name] != $value)) {
//                            return false;
////                        }
////                    }
//                }
//
//                return true;
//            }
//
//            return false;
//        }


        $menuItems = [
            ['label' => Yii::t('view','menu.catalog'), 'url' => ['/catalog/index']],
            ['label' => Yii::t('view','menu.service'), 'url' => ['/service/index']],

            ['label' => Yii::t('view','menu.about'), 'url' => ['/site/about'],
                'items'=> [
                    ['label' => Yii::t('view','menu.news'), 'url' => ['/news/index']],
                    ['label' => Yii::t('view','menu.actions'), 'url' => ['/actions/index']],
                ]
            ],
            ['label' => Yii::t('view','menu.contact'), 'url' => ['/site/contact']],
        ];
        $logout = ' . Yii::$app->user->identity->username .';

        if (Yii::$app->user->isGuest) {
//            $menuItems[] = ['label' => Yii::t('view','menu.signup'), 'url' => ['/site/signup']];
            $menuItems[] = ['label' => Yii::t('view','menu.login'), 'url' => ['/site/login']];
        } else {
            $menuItems[] = array(
                'label' =>  Yii::t('view','{username}',['username' => Yii::$app->user->identity->username]),
                'url' => ['/site/profile'],
                'items'=> [
                    ['label' => Yii::t('view','menu.settings'), 'url' => ['/site/settings']],
                    ['label' => Yii::t('view','menu.order'), 'url' => ['/order/index']],
                    ['label' => Yii::t('view','menu.logout'), 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                ],
            );
        }

        NavBar::begin([
            'brandLabel' => '<img src="/img/logo-dtrank.png">' ,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-default navbar-top',
            ],
        ]);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();

        ?>

        <?php  /* ?>

        <div class="navbar navbar-default navbar-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Stat Toggle Nav Link For Mobiles -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <i class="fa fa-bars"></i> </button>
                    <!-- End Toggle Nav Link For Mobiles -->
                    <a class="navbar-brand" href="/"><img alt="" src="/img/logo-dtrank.png"></a>
                </div>
                <div class="navbar-collapse collapse">
                    <!-- Stat Search -->
                    <div class="search-side"> <a class="show-search"><i class="fa fa-search"></i></a>
                        <div class="search-form">
                            <form autocomplete="off" role="search" method="get" class="searchform" action="#">
                                <input type="text" value="" name="s" id="s" placeholder="Search the site..."> </form>
                        </div>
                    </div>
                    <!-- End Search -->
                    <!-- Start Navigation List -->


                    <ul class="nav navbar-nav navbar-right">
                        <?php foreach($menuItems as $menuItem):
                            ?>
                        <li>

                            <?php $linkOptions = isset($menuItem['linkOptions']) ? $menuItem['linkOptions'] : [];

                                $active = isItemActive($menuItem);
                                var_dump($active);
                            ?>
                            <?= Html::a($menuItem['label'], $menuItem['url'], $linkOptions) ?>
                            <?php if(!empty($menuItem['items'])): ?>
                            <ul class="dropdown">
                                <?php foreach((array) $menuItem['items'] as $subItem): ?>
                                <li>
                                    <?php $linkOptions = isset($subItem['linkOptions']) ? $subItem['linkOptions'] : []; ?>
                                    <?= Html::a($subItem['label'], $subItem['url'], $linkOptions) ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <!-- End Navigation List -->
                </div>
            </div>

            <!-- Mobile Menu Start -->
            <ul class="wpb-mobile-menu">
                <li>
                    <a href="index.html">Home</a>
                    <ul class="dropdown">
                        <li><a href="index.html">Home Main Version</a>
                        </li>
                        <li><a href="index-01.html">Home Version 1</a>
                        </li>
                        <li><a href="index-02.html">Home Version 2</a>
                        </li>
                        <li><a href="index-03.html">Home Version 3</a>
                        </li>
                        <li><a href="index-04.html">Home Version 4</a>
                        </li>
                        <li><a href="index-05.html">Home Version 5</a>
                        </li>
                        <li><a href="index-06.html">Home Version 6</a>
                        </li>
                        <li><a href="index-07.html">Home Version 7</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="active" href="about.html">Pages</a>
                    <ul class="dropdown">
                        <li><a href="about.html">About</a>
                        </li>
                        <li><a href="services.html">Services</a>
                        </li>
                        <li><a href="right-sidebar.html">Right Sidebar</a>
                        </li>
                        <li><a href="left-sidebar.html">Left Sidebar</a>
                        </li>
                        <li><a class="active" href="404.html">404 Page</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Shortcodes</a>
                    <ul class="dropdown">
                        <li><a href="tabs.html">Tabs</a>
                        </li>
                        <li><a href="buttons.html">Buttons</a>
                        </li>
                        <li><a href="action-box.html">Action Box</a>
                        </li>
                        <li><a href="testimonials.html">Testimonials</a>
                        </li>
                        <li><a href="latest-posts.html">Latest Posts</a>
                        </li>
                        <li><a href="latest-projects.html">Latest Projects</a>
                        </li>
                        <li><a href="pricing.html">Pricing Tables</a>
                        </li>
                        <li><a href="accordion-toggles.html">Accordion & Toggles</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="portfolio-3.html">Portfolio</a>
                    <ul class="dropdown">
                        <li><a href="portfolio-2.html">2 Columns</a>
                        </li>
                        <li><a href="portfolio-3.html">3 Columns</a>
                        </li>
                        <li><a href="portfolio-4.html">4 Columns</a>
                        </li>
                        <li><a href="single-project.html">Single Project</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="blog.html">Blog</a>
                    <ul class="dropdown">
                        <li><a href="blog.html">Blog - right Sidebar</a>
                        </li>
                        <li><a href="blog-left-sidebar.html">Blog - Left Sidebar</a>
                        </li>
                        <li><a href="single-post.html">Blog Single Post</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
            <!-- Mobile Menu End -->

        </div>
        <!-- End Header ( Logo & Naviagtion ) -->
  <?php */  ?>
    </header>
    <!-- End Header -->
<?php if (isset($this->blocks['content'])): ?>
    <?= $this->blocks['content'] ?>
<?php else: ?>
    <div id="content">
        <div class="container">
            <div class="page-content">
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <!-- Start Content -->
                <?= $content ?>
                <!-- End Content -->
            </div>
        </div>
    </div>

<?php endif; ?>



    <?= $this->render('/base/footer') ?>

</div>

<div class="wrap">

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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
*/?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
