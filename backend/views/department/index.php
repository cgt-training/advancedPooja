<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Department';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alert alert-info alert-dismissible" style="margin-top:5%;display: none" id="completed-message">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>Department Created Successfully</h4>        
            </div>
<div class="row" style="margin-top:5%" id="index-content">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center>
                <?= Html::button('Create Department', [
                    'value'=> Url::toRoute('department/create'), 
                    'class' => 'btn btn-success btn-lg pull-right', 
                    'id'=>'create-request' ]) 
                ?>
                <h1 style="color:#3C8DBC">Department</h1>
              </center>
              <?php
                    Modal::begin([
                        'header'=>'<h2>Department</h2>',
                        'id'=>'create-modal',
                        'size'=>'modal-lg',
                        'options' => [
                            'tabindex' => false // important for Select2 to work properly
                        ],
                    ]);
                    echo "<div id='modalContent'></div>";
                    Modal::end();
                ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table-index" class="table table-responsive table-bordered table-hover">
                <thead style="font-size:large">
                    <tr style="color:#3C8DBC">
                        <th>Branch Name</th>
                        <th>Department Name</th>
                        <th>Company Name</th>
                        <th>Created Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($deptList as $dept): ?>
                        <tr style="font-size:large">
                            <td><?= Html::encode("$dept->branch_id") ?></td>
                            <td><?= Html::encode("$dept->dept_name") ?></td>
                            <td><?= Html::encode("$dept->company_id") ?></td>
                            <td><?= Html::encode("$dept->dept_created_date") ?></td>
                            <td>
                                <a class="view-request" href="<?= Url::toRoute('/department/view?id='.$dept->dept_id)?>" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>

                                <a class="update-request" title='Update' href="<?= Url::toRoute('/department/update?id='.$dept->dept_id)?>"><span class="glyphicon glyphicon-pencil"></span></a>

                                <a class="delete-request" href="<?= Url::toRoute('/department/delete?id='.$dept->dept_id)?>"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
              <div class="pull-right">
                <?= LinkPager::widget(['pagination' => $pagination]) ?>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>