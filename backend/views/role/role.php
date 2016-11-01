<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Create Role';
$this->params['breadcrumbs'][] = ['label' => 'Role', 'url' => ['create']];
?>
<?php //$listData=ArrayHelper::map($namelist,'name','name');?>

<div class="box box-primary" style="margin-top:7%">
    <div class="box-header with-border">
        <h3 class="box-title">
        <a class="back_to_index" href="<?= Url::toRoute('/role')?>"><h3 style="display: inherit"><i class="fa fa-arrow-circle-left"></i> </h3></a>
        <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?php  $form = ActiveForm::begin(['id'=>'dynamic-form']); ?>
        <div class="col-sm-6 col-xs-12 col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description')->textArea(['maxlength' => true])?>
            </div>
    <?php  DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $itemchild[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            // 'parent',
            'child',
        ],
    ]); ?>
<div class="col-sm-6 col-xs-12 col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title pull-left">Add Permissions</h3>
            <div class="pull-right">
                <button type="button" class="add-item btn btn-success btn-xs pull-right"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($itemchild as $i => $item): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Assign Permission</h3>
                            <div class="pull-right">
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                        <!-- <?= $form->field($item, "[{$i}]parent")->textInput(["maxlength" => true]) ?> -->
                        <div class="row">
                            <div class="col-sm-6">
                            <?= $form->field($item, "[{$i}]child")->dropDownList([ $listData]) ?>
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
        </center>
    </div>
</div>