<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); 
    	$listData = [User::STATUS_ACTIVE => 'Active' , User::STATUS_DELETED => 'Deleted'];
        $options = ArrayHelper::map($auth_item, 'name', 'description');
    ?>
	<?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'email')->textInput() ?>
	<?= $form->field($model, 'status')
			 ->dropDownList($listData); ?>
    <?= $form->field($model, 'auth_assignment')->checkboxList($options, ['unselect'=>NULL]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
