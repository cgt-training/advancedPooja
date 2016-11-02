<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Update Company</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="branches-form form-horizontal">
        <?php $form = ActiveForm::begin(['id' => 'create-form']); ?>
            <div class="box-body">
                <div>
                    <label for="company-logo" class="col-sm-2 control-label">Company Logo</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'file')->fileInput()->label(false); ?>
                          <?php       
                            if(!empty($model->getAttribute('company_logo')))
                            {
                                $logo  = Html::img('@web/'.$model->getAttribute('company_logo'),['class'=>'img-responsive center-block']);
                                echo Html::tag('div', $logo, ['class' => 'file-preview-frame col-md-3']);
                                // echo Html::a('Remove',Url::to('remove-logo?id='.$model->company_id),['class' => 'btn btn-danger',]);
                            }
                          ?>
                    </div>
                </div>

                <div>
                    <label for="company-name" class="col-sm-2 control-label">Company Name</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'company_name')->textInput(['maxlength' => true, 'id' => 'company_name'])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="company-email" class="col-sm-2 control-label">Company Email</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'company_email')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                </div>

                

                <div>
                    <label for="company-address" class="col-sm-2 control-label">Company Address</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'c_address')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="created-date" class="col-sm-2 control-label">Created Date</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'c_createDate')->widget(DatePicker::classname(), [
                             'clientOptions' => [
                                 'autoclose' => true,
                                 'format' => 'yyyy-m-dd'
                             ]
                            ])->label(false) 
                        ?>
                    </div>
                </div>

                <div>
                    <label for="company-status" class="col-sm-2 control-label">company Status</label>

                    <div class="col-sm-9">
                        <?= $form->field($model, 'company_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => ''])->label(false) ?>
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