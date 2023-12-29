<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Datcauhoi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datcauhoi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tieude')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tennguoibenh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'noidung')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filedinhkem')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'noidungtraloi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dateTime')->textInput() ?>

    <?= $form->field($model, 'tenbacsi')->textarea(['rows' => 6]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
