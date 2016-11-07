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

<?php $companyList = ArrayHelper::map($companyList,'company_id','company_name');?>
<?php $branchList = ArrayHelper::map($branchList,'br_id','br_name');?>

<div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Create Department</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="branches-form form-horizontal">
        <?php $form = ActiveForm::begin(['id' => 'create-form']); ?>
            <div class="box-body">
                <div>
                    <label for="branch-name" class="col-sm-2 control-label">Branch Name</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'branch_id')->widget(Select2::classname(), [
                            'data' => $branchList,
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false)
                    ?>
                    </div>
                </div>

                <div>
                    <label for="dept-name" class="col-sm-2 control-label">Department Name</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'dept_name')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="company-name" class="col-sm-2 control-label">Company Name</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'company_id')->widget(Select2::classname(), [
                            'data' => $companyList,
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false)
                    ?>
                    </div>
                </div>

                <div>
                    <label for="dept-date" class="col-sm-2 control-label">Created Date</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'dept_created_date')->widget(DatePicker::classname(), [
                             'clientOptions' => [
                                 'autoclose' => true,
                                 'format' => 'yyyy-m-dd'
                             ]
                            ])->label(false)
                        ?>
                    </div>
                </div>

                <div>
                    <label for="dept-status" class="col-sm-2 control-label">Department Status</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'dept_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => ''])->label(false) ?>
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


<!-- Register JS FILE -->
<?=$this->registerJsFile('@jspath/formSubmit.js',['depends' => [yii\web\JqueryAsset::className()]]);