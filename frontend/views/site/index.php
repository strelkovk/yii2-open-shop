<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<?php $this->beginBlock('content'); ?>




<div class="site-index">



    <!-- Begin Home Page Slider -->
    <section id="home">
        <div class="container-fluid">
            <div class="row">

                           <!-- Carousel -->
                <div id="main-slide" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php foreach ($items as $key => $item):?>
                            <li data-target="#main-slide" data-slide-to="<?= $key ?>"></li>
                        <?php endforeach ?>
                    </ol>
                    <!--/ Indicators end-->

                    <!-- Carousel inner -->
                    <div class="carousel-inner">
                        <?php foreach ($items as $key => $item):?>
                           <div class="item <?= $key>0 ? : 'active' ?>">

                                <img class="img-responsive" src='/img/<?= $item['img'] ?>.jpg' alt="slider">
                                <div class="slider-content">
                                    <div class="col-md-12 text-center">
                                        <h2 class="animated2">
                                            <?= $item['title'] ?>
                                        </h2>
                                        <h3 class="animated3">
                                            <?= $item['note'] ?>
                                        </h3>
                                        <p class="animated4"><a href="<?=$item['url']?>" class="slider btn btn-system btn-large"><?= $item['button'] ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach ?>


                    <!-- Controls -->
                    <a class="left carousel-control" href="#main-slide" data-slide="prev">
                        <span><i class="fa fa-angle-left"></i></span>
                    </a>
                    <a class="right carousel-control" href="#main-slide" data-slide="next">
                        <span><i class="fa fa-angle-right"></i></span>
                    </a>
                </div>
        <!-- /carousel -->
            </div>
        </div>
    </section>
    <!-- End Home Page Slider -->


    <div class="container">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div class="body-content">

            <div class="row">
                <div class="col-lg-4">
                    <h2>Heading</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <h2>Heading</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <h2>Heading</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
                </div>
            </div>

        </div>
    </div>
</div>


<?php $this->endBlock(); ?>