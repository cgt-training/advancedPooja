<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model frontend\models\Po */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="po-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'po_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des')->textarea(['rows' => 6]) ?>

    <!-- Dynamic form widget code -->

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> PO ITEMS</h4></div>
        <div class="panel-body">
             <?php  DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsPoItems[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'po_item_no',
                    'quantity',
                ],
            ]); ?>
        <div class="col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Add PO ITEMS</h3>
                <div class="pull-right">
                    <button type="button" class="add-item btn btn-success btn-xs pull-right"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsPoItems as $i => $modelsPOItem): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Create PO ITEM</h3>
                        <div class="pull-right">
                            
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelsPOItem->isNewRecord) {
                                echo Html::activeHiddenInput($modelsPOItem, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelsPOItem, "[{$i}]po_item_no")->textInput(["maxlength" => true]) ?>
                            </div>
                        
                            <div class="col-sm-6">
                                <?= $form->field($modelsPOItem, "[{$i}]quantity")->textInput(["maxlength" => true]) ?>
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
</div>
</div>


    <!-- End Dynamic form widget code -->

    <div class="row form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
