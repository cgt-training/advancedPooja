<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(['id' => 'create-form']) ?>

    <?= $form->field($model, 'file')->fileInput(); ?>
    
    <div class="row">
      <?php       
        if(!empty($model->getAttribute('company_logo')))
        {
            $logo  = Html::img('@web/'.$model->getAttribute('company_logo'),['class'=>'img-responsive center-block']);
            echo Html::tag('div', $logo, ['class' => 'file-preview-frame col-md-3']);
            // echo Html::a('Remove',Url::to('remove-logo?id='.$model->company_id),['class' => 'btn btn-danger',]);
        }
      ?>
    </div>
    
    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true, 'id' => 'company_name']) ?>

    <?= $form->field($model, 'company_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_address')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'c_createDate')->textInput() ?> -->
    <?= $form->field($model, 'c_createDate')->widget(DatePicker::classname(), [
    // 'model' => $model,
    // 'attribute' => 'br_created_date',
    // 'template' => '{input}{addon}',
         'clientOptions' => [
             'autoclose' => true,
             'format' => 'yyyy-m-dd'
         ]
        ]) 
    ?>

    <?= $form->field($model, 'company_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back', ['index'], ['class' =>'btn btn-default back_to_index']) ?>
    </div>

    <!-- <?= Html::button('Test', [ 
            'class' => 'btn btn-success', 
            'id'=>'test' ]) 
        ?>
    -->
    <?php ActiveForm::end(); ?>

</div>

<!-- Register JS File -->
<?= $this->registerJsFile('@jspath/formSubmit.js',['depends' => [yii\web\JqueryAsset::className()]]);