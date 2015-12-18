<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
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
                            <li><a href="#"><i class="fa fa-map-marker"></i> House-54/A, London, UK</a> </li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i> info@yourcompany.com</a> </li>
                            <li><a href="#"><i class="fa fa-phone"></i> +12 345 678 000</a> </li>
                        </ul>
                        <!-- End Contact Info -->
                    </div>
                    <div class="col-md-6">
                        <!-- Start Social Links -->
                        <ul class="social-list">
                            <li> <a class="facebook itl-tooltip" data-placement="bottom" title="Facebook" href="#"><i class="fa fa-facebook"></i></a> </li>
                            <li> <a class="twitter itl-tooltip" data-placement="bottom" title="Twitter" href="#"><i class="fa fa-twitter"></i></a> </li>
                            <li> <a class="google itl-tooltip" data-placement="bottom" title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a> </li>
                            <li> <a class="dribbble itl-tooltip" data-placement="bottom" title="Dribble" href="#"><i class="fa fa-dribbble"></i></a> </li>
                            <li> <a class="linkdin itl-tooltip" data-placement="bottom" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a> </li>
                            <li> <a class="flickr itl-tooltip" data-placement="bottom" title="Flickr" href="#"><i class="fa fa-flickr"></i></a> </li>
                            <li> <a class="tumblr itl-tooltip" data-placement="bottom" title="Tumblr" href="#"><i class="fa fa-tumblr"></i></a> </li>
                            <li> <a class="instgram itl-tooltip" data-placement="bottom" title="Instagram" href="#"><i class="fa fa-instagram"></i></a> </li>
                            <li> <a class="vimeo itl-tooltip" data-placement="bottom" title="vimeo" href="#"><i class="fa fa-vimeo-square"></i></a> </li>
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
        NavBar::begin([
            'brandLabel' => 'My Company',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-default navbar-top',
            ],
        ]);
        $menuItems = [
            ['label' => Yii::t('view','menu.home'), 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems[] = [
                'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
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

        <?php /* ?>

        <div class="navbar navbar-default navbar-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Stat Toggle Nav Link For Mobiles -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <i class="fa fa-bars"></i> </button>
                    <!-- End Toggle Nav Link For Mobiles -->
                    <a class="navbar-brand" href="index.html"><img alt="" src="images/margo.png"></a>
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
                        <li> <a href="index.html">Home</a>
                            <ul class="dropdown">
                                <li><a href="index.html">Home Main Version</a></li>
                                <li><a href="index-01.html">Home Version 1</a></li>
                                <li><a href="index-02.html">Home Version 2</a></li>
                                <li><a href="index-03.html">Home Version 3</a></li>
                                <li><a href="index-04.html">Home Version 4</a></li>
                                <li><a href="index-05.html">Home Version 5</a></li>
                                <li><a href="index-06.html">Home Version 6</a></li>
                                <li><a href="index-07.html">Home Version 7</a></li>
                                <!-- <li><a href="index-08.html">Home Version 8</a></li> -->
                            </ul>
                        </li>
                        <li> <a class="active" href="about.html">Pages</a>
                            <ul class="dropdown">
                                <li><a href="about.html">About</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="right-sidebar.html">Right Sidebar</a></li>
                                <li><a href="left-sidebar.html">Left Sidebar</a></li>
                                <li><a class="active" href="404.html">404 Page</a></li>
                            </ul>
                        </li>
                        <li> <a href="#">Shortcodes</a>
                            <ul class="dropdown">
                                <li><a href="tabs.html">Tabs</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="action-box.html">Action Box</a></li>
                                <li><a href="testimonials.html">Testimonials</a></li>
                                <li><a href="latest-posts.html">Latest Posts</a></li>
                                <li><a href="latest-projects.html">Latest Projects</a></li>
                                <li><a href="pricing.html">Pricing Tables</a></li>
                                <!-- <li><a href="animated-graphs.html">Animated Graphs</a></li> -->
                                <li><a href="accordion-toggles.html">Accordion & Toggles</a></li>
                            </ul>
                        </li>
                        <li> <a href="portfolio-3.html">Portfolio</a>
                            <ul class="dropdown">
                                <li><a href="portfolio-2.html">2 Columns</a></li>
                                <li><a href="portfolio-3.html">3 Columns</a></li>
                                <li><a href="portfolio-4.html">4 Columns</a></li>
                                <li><a href="single-project.html">Single Project</a></li>
                            </ul>
                        </li>
                        <li> <a href="blog.html">Blog</a>
                            <ul class="dropdown">
                                <li><a href="blog.html">Blog - right Sidebar</a></li>
                                <li><a href="blog-left-sidebar.html">Blog - Left Sidebar</a></li>
                                <li><a href="single-post.html">Blog Single Post</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>

                    <!-- End Navigation List -->
                </div>
            </div>
 <? */ ?>

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
    </header>
    <!-- End Header -->

    <!-- Start Content -->
    <div id="content">
        <div class="container">
            <div class="page-content">
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <?= $content ?>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <?= $this->render('/base/footer') ?>

</div>

<?php /* ?>

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
