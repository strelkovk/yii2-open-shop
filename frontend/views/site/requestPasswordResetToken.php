<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <div class="row">
        <div class="col-lg-9">
            <div class="classic-title">

                <span><h1><?= Yii::t('view','password-reset.info')?></h1></span>
                <span><?= Yii::t('view','password-reset.title.info')?></span>

            </div>
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email') ?>

                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-system btn-large']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
