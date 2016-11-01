<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Create User</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="branches-form form-horizontal">
        <?php $form = ActiveForm::begin(['id' => 'create-form']); ?>
            <div class="box-body">
                <div>
                    <label for="firstname" class="col-sm-2 control-label">FirstName</label>

                    <div class="col-sm-10">
                        <?= $form->field($model, 'firstname')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="lastname" class="col-sm-2 control-label">LastName</label>

                    <div class="col-sm-10">
                        <?= $form->field($model, 'lastname')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="role" class="col-sm-2 control-label">Role</label>

                    <div class="col-sm-10">
                        <?= $form->field($model, 'role')->dropDownList([ 'admin' => 'Admin', 'teacher' => 'Teacher', 'student' => 'Student', '' => '', ], ['prompt' => ''])->label(false) ?>

                    </div>
                </div>

                <div>
                    <label for="username" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                        <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="authkey" class="col-sm-2 control-label">AuthKey</label>

                    <div class="col-sm-10">
                        <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true, 'readonly' => true])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="password" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'readonly' => true])->label(false) ?>

                    </div>
                </div>

                <div>
                    <label for="pwresettoken" class="col-sm-2 control-label">Password Reset Token</label>

                    <div class="col-sm-10">
                        <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true, 'readonly' => true])->label(false) ?>

                    </div>
                </div>

                <div>
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'readonly' => true])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="status" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                        <?= $form->field($model, 'status')->textInput(['readonly' => true])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="createddate" class="col-sm-2 control-label">Created At</label>

                    <div class="col-sm-10">
                        <?= $form->field($model, 'created_at')->textInput(['readonly' => true])->label(false) ?>
                    </div>
                </div>

                <div>
                    <label for="updatedate" class="col-sm-2 control-label">Updated At</label>

                    <div class="col-sm-10">   
                        <?= $form->field($model, 'updated_at')->textInput(['readonly' => true])->label(false) ?>

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
