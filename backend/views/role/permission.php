<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="box box-info">
        <div class="box-header with-border">
            <a class="back_to_index" href="<?= Url::toRoute('/role')?>"><h3 style="display: inherit"><i class="fa fa-arrow-circle-left"></i> </h3></a>

            <h3 class="box-title">Create Permission</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="branches-form form-horizontal">
        <?php $form = ActiveForm::begin(['id' => 'create-form']); ?>
            <div class="box-body">
                <div>
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="des" class="col-sm-2 control-label">Description</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'description')->textArea(['maxlength' => true])->label(false)?>
                    </div>
                </div>

            </div><!-- /.box-body -->
            
            <div class="box-footer">
                <center>
                <?= Html::submitButton('Create' , ['class' =>  'btn btn-success btn-lg' ]) ?>
                </center>
            </div><!-- /.box-footer -->
        <?php ActiveForm::end(); ?>
        </div>
    </div>