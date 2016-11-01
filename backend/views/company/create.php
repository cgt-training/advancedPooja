<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model frontend\models\Company */
/* @var $form yii\widgets\ActiveForm */
date_default_timezone_set('Asia/Kolkata');
$current_date = date("Y-m-d h:i:sa");


/* @var $this yii\web\View */
/* @var $model frontend\models\Company */

$this->title = 'Create Company';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <div class="container" style="margin-top:7%"> -->
    <!-- <div class="row" style="width:85%"> -->
    <div class="box box-primary" style="margin-top:7%">
        <div class="box-header with-border">
            <a class="back_to_index" href="<?= Url::toRoute('/company')?>"><h3 style="display: inherit"><i class="fa fa-arrow-circle-left"></i> </h3></a>   
              <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="box-body">
            <?php
                if(isset($msg))
                {
                    echo '<h3 class="text-center" style="color:red">'.$msg.'</h3>';
                }
            ?>
            <?php  $form = ActiveForm::begin(['id'=>'dynamic-form']); ?>
            <div class="col-sm-6 col-xs-12 col-md-6">
                <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'company_email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'c_address')->textInput(['maxlength' => true]) ?>

                <!-- readonly field.... Shows date created when the company is updated(Not shown when company is created) -->
                <?= $model->isNewRecord ?'':($form->field($model, 'c_createDate')->textInput(['readonly' =>true])) ?>

                <?= $form->field($model, 'company_status')->dropDownList([ 'active' => 'Active', 'deactive' => 'Deactive' ], ['prompt' => 'Select']) ?>

    
                <?= $model->isNewRecord ?'':(Html::img($img,['alt' => 'Profile','class'=>"img-responsive",'width'=>200,])) ?>
    
                <?= $form->field($model, 'file')->fileInput() ?>
            </div>
    <?php  DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsBranch[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'branch_name',
            'branch_status',
        ],
    ]); ?>
        <div class="col-sm-6 col-xs-12 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">Add Branches</h3>
                    <div class="pull-right">
                        <button type="button" class="add-item btn btn-success btn-xs pull-right"><i class="glyphicon glyphicon-plus"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="container-items"><!-- widgetContainer -->
                        <?php foreach ($modelsBranch as $i => $modelBranch): ?>
                        <div class="item panel panel-default"><!-- widgetBody -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Create Branch</h3>
                                <div class="pull-right">
                            
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                    // necessary for update action.
                                if (! $modelBranch->isNewRecord) {
                                    echo Html::activeHiddenInput($modelBranch, "[{$i}]id");
                                }
                                ?>
                        <?= $form->field($modelBranch, "[{$i}]br_name")->textInput(["maxlength" => true]) ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelBranch, "[{$i}]br_status")->dropDownList([ "active" => "Active", "deactive" => "Deactive" ], ["prompt" => "Select"])?>
                            </div>
                            
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
    <div class="box-footer">
        <center>
            <?= Html::submitButton('Create' , ['class' =>  'btn btn-success btn-lg' ]) ?>
            <?= Html::a('Back', ['index'], ['class' =>'btn btn-default btn-lg back_to_index']) ?>
        </center>
    </div>
</div>
<!-- </div> -->
<!-- </div> -->



    
