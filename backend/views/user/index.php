<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'email:email',
            [
        		'attribute' => 'status',
				'value' => function ($model) {
				              return  ($model->status == User::STATUS_ACTIVE? 'Active' : 'Deleted');
				            }    
        	],
        		
        	[
        		'attribute' => 'created_at',
        		'format' => ['date', 'php:d/m/Y H:i:s'],
        	],
        	[
        		'attribute' => 'updated_at',
        		'format' => ['date', 'php:d/m/Y H:i:s'],
        	],
        		
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
