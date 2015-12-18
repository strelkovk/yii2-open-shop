<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
        	[	'attribute' => 'status',
        		'value' => ($model->status == User::STATUS_ACTIVE? 'Active' : 'Deleted'),
        	],
            [
                'attribute' => 'auth_assignment',
                'value' => implode(',',$model->auth_assignment),
            ],
        	[
        		'attribute' => 'created_at',
        		'format' => ['date', 'php:d/m/Y H:i:s'],
        	],
        	[
        		'attribute' => 'updated_at',
        		'format' => ['date', 'php:d/m/Y H:i:s'],
        	],
        ],
    ]) ?>
</div>
