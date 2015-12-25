<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="row">
        <div class="col-lg-9">

            <div class="classic-title">
<!--                <span><h1>--><?//= Html::encode($this->title) ?><!--</h1></span>-->
<!--                <span>Please fill out the following fields to signup:</span>-->

                <span><h1><?= Yii::t('view','signup.info')?></h1></span>
                <span><?= Yii::t('view','signup.title.info')?></span>

            </div>


            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-system btn-large', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-3 text-center">
            <div class="s-icons">
                <a href="#"><img src="/img/s-icons_facebook.jpg" alt=""></a>
                <a href="#"><img src="/img/s-icons_twitter.jpg" alt=""></a>
                <a href="#"><img src="/img/s-icons_google+.jpg" alt=""></a>
                <a href="#"><img src="/img/s-icons_vkontakte.jpg" alt=""></a>
            </div>
        </div>
    </div>
</div>
