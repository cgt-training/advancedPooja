<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $listData=ArrayHelper::map($locationList,'zip_code','zip_code');?>

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Create Customer</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="branches-form form-horizontal">
        <?php $form = ActiveForm::begin(['id' => 'create-form']); ?>
            <div class="box-body">
                <div>
                    <label for="customer-name" class="col-sm-2 control-label">Customer Name</label>

                    <div class="col-sm-10">
                        <?= $form->field($model, 'cust_name')->textInput(['maxlength' => true])->label(false);
                        ?>
                    </div>
                </div>

                <div>
                    <label for="zip-code" class="col-sm-2 control-label">Zip Code</label>

                    <div class="col-sm-10">
                        <?= $form->field($model, 'zip_code')->widget(Select2::classname(), [
                                'data' => $listData,
                                'options' => [
                                    'placeholder' => 'select zip code',
                                    'id' => 'select-zip-code',
                                    'onchange' => 'fill_data()',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ],
                            ])->label(false)
                        ?>
                    </div>
                </div>

                <div>
                    <label for="city" class="col-sm-2 control-label">City</label>

                    <div class="col-sm-10">
                        <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'id' => 'city'])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="province" class="col-sm-2 control-label">Province</label>

                    <div class="col-sm-10">
                        <?= $form->field($model, 'province')->textInput(['maxlength' => true, 'id' => 'province'])->label(false)
                        ?>
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