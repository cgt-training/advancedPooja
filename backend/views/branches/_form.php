<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model frontend\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(['id' => 'create-form']); ?>
    
    <?php $listData=ArrayHelper::map($companyList,'company_id','company_name');?>

<!-- It will create the dropdownlist with search functianlity, Select2 widget is used -->
    <?= $form->field($model, 'company_id')->widget(Select2::classname(), [
            'data' => $listData,
            'language' => 'de',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'br_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'br_address')->textInput(['maxlength' => true]) ?>

    <!-- <?= Html::label('Created Date', 'br_created_date') ?> -->

<!-- Date Picker widget is used to insert the datepicker -->
    <?= $form->field($model, 'br_created_date')->widget(DatePicker::classname(), [
    // 'model' => $model,
    // 'attribute' => 'br_created_date',
    // 'template' => '{input}{addon}',
         'clientOptions' => [
             'autoclose' => true,
             'format' => 'yyyy-m-dd'
         ]
        ]) 
    ?>


    <?= $form->field($model, 'br_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back', ['index'], ['class' =>'btn btn-default back_to_index']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!-- Register JS File -->
<?=$this->registerJsFile('@jspath/formSubmit.js',['depends' => [yii\web\JqueryAsset::className()]]);