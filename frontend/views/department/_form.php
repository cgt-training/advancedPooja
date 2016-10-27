<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model frontend\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(['id' => 'create-form']); ?>

    <?php $companyList = ArrayHelper::map($companyList,'company_id','company_name');?>
    <?php $branchList = ArrayHelper::map($branchList,'br_id','br_name');?>

    <!-- <?= $form->field($model, 'branch_id')->dropDownList($branchList, ['prompt' => '']) ?> -->
    <?= $form->field($model, 'branch_id')->widget(Select2::classname(), [
            'data' => $branchList,
            'language' => 'de',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'dept_name')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'company_id')->dropDownList($companyList, ['prompt' => '']) ?> -->
    <?= $form->field($model, 'company_id')->widget(Select2::classname(), [
            'data' => $companyList,
            'language' => 'de',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <!-- <?= $form->field($model, 'dept_created_date')->textInput() ?> -->
    <?= $form->field($model, 'dept_created_date')->widget(DatePicker::classname(), [
    // 'model' => $model,
    // 'attribute' => 'br_created_date',
    // 'template' => '{input}{addon}',
         'clientOptions' => [
             'autoclose' => true,
             'format' => 'yyyy-m-dd'
         ]
        ]) 
    ?>

    <?= $form->field($model, 'dept_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back', ['index'], ['class' =>'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!-- Register JS FILE -->
<?=$this->registerJsFile('@jspath/formSubmit.js',['depends' => [yii\web\JqueryAsset::className()]]);