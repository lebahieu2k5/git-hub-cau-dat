<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Catnew */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catnew-form row">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-12">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=>$model->attributeLabels()['name']]) ?>
    </div>

    <div class="col-xs-6">
        <?= $form->field($model, 'position')->dropDownList(\common\models\Catnew::getPosition()) ?>
    </div>

    <div class="col-xs-6">
        <?= $form->field($model, 'ord')->input('number') ?>
    </div>

    <div class="col-xs-6">
        <?= $form->field($model, 'active')->checkbox() ?>
    </div>

    <div class="col-xs-6">
        <?= $form->field($model, 'home')->checkbox() ?>
    </div>


    <?php if (!$model->isNewRecord): ?>
    <div class="col-xs-12">
    <?= $form->field($model, 'seo_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seo_keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textarea(['rows' => 6]) ?>
    </div>
    <?php endif; ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
