<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\url;
/* @var $this yii\web\View */
/* @var $model frontend\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(['id' => 'create-form']); ?>

    <?= $form->field($model, 'cust_name')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?> -->

    <?php $listData=ArrayHelper::map($locationList,'zip_code','zip_code');?>
<!-- It will create the dropdownlist with search functianlity, Select2 widget is used -->
    <?= $form->field($model, 'zip_code')->widget(Select2::classname(), [
            'data' => $listData,
            'language' => 'de',
            'pluginOptions' => [
                'allowClear' => true,
            ],
            'options' => [
            	'placeholder' => '',
            	'id' => 'select-zip-code',
            ],
        ]);
    ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'id' => 'city']) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true, 'id' => 'province']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'create']) ?>
        <?= Html::a('Back', ['index'], ['class' =>'btn btn-default back_to_index']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!-- Register JS File -->
<?=$this->registerJsFile('@web/js/formSubmit.js',['depends' => [yii\web\JqueryAsset::className()]]);