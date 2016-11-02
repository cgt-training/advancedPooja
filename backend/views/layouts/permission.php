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
<?php $listData=ArrayHelper::map($namelist,'name','name');?>

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
    
    <div class="box-footer">
        <center>
            <?= Html::submitButton('Create' , ['class' =>  'btn btn-success btn-lg' ]) ?>
        </center>
    </div>
    <?php ActiveForm::end(); ?>
</div>