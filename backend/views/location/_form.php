<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Location */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Create Location</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="branches-form form-horizontal">
        <?php $form = ActiveForm::begin(['id' => 'create-form']); ?>
            <div class="box-body">
                <div>
                    <label for="zip-code" class="col-sm-2 control-label">Zip Code</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="city" class="col-sm-2 control-label">City</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'city')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="province" class="col-sm-2 control-label">Province</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'province')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                </div>

            </div><!-- /.box-body -->
            
            <div class="box-footer">
                <center>
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary btn-lg']) ?>
                <?= Html::a('Back', ['index'], ['class' =>'btn btn-default btn-lg back_to_index']) ?>
                </center>
            </div><!-- /.box-footer -->
        <?php ActiveForm::end(); ?>
        </div>
    </div>

<!-- Register JS File -->
<?=$this->registerJsFile('@jspath/formSubmit.js',['depends' => [yii\web\JqueryAsset::className()]]);