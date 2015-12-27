<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="row">
        <div class="col-lg-9">
            <div class="classic-title">

                <span><h1><?= Yii::t('view','login.info')?></h1></span>
                <span><?= Yii::t('view','login.title.info')?></span>

            </div>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    <?= Yii::t('view','login.reset')?> <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-system btn-large', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-3 text-center">
            <div class="social-title"><span><h1><?= Yii::t('view','login.social')?></h1></span></div>
            <div class="s-icons">
                <ul class="social-list">
                    <li> <a class="facebook itl-tooltip" data-placement="bottom" title="Facebook" href="#"><i class="fa fa-facebook"></i></a> </li>
                    <li> <a class="twitter itl-tooltip" data-placement="bottom" title="Twitter" href="#"><i class="fa fa-twitter"></i></a> </li>
                    <li> <a class="google itl-tooltip" data-placement="bottom" title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a> </li>
                    <li> <a class="skype itl-tooltip" data-placement="bottom" title="Skype" href="#"><i class="fa fa fa-vk"></i></a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>



