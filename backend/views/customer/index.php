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
$this->title = 'Customer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alert alert-info alert-dismissible" style="margin-top:5%;display: none" id="completed-message">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>Customer Created Successfully</h4>        
            </div>
<div class="row" style="margin-top:5%" id="index-content">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center>
                <?= Html::button('Create Customer', [
                    'value'=> Url::toRoute('customer/create'), 
                    'class' => 'btn btn-success btn-lg pull-right', 
                    'id'=>'create-request' ]) 
                ?>
                <h1 style="color:#3C8DBC">Customer</h1>
              </center>
              <?php
                    Modal::begin([
                        'header'=>'<h2>Customer</h2>',
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
                        <th>Customer Name</th>
                        <th>Zip Code</th>
                        <th>City</th>
                        <th>Province</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customerList as $customer): ?>
                        <tr style="font-size:large">
                            <td><?= Html::encode("$customer->cust_name") ?></td>
                            <td><?= Html::encode("$customer->zip_code") ?></td>
                            <td><?= Html::encode("$customer->city") ?></td>
                            <td><?= Html::encode("$customer->province") ?></td>
                            <td>
                                <a class="view-request" href="<?= Url::toRoute('/customer/view?id='.$customer->cust_id)?>" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>

                                <a class="update-request" title='Update' href="<?= Url::toRoute('/customer/update?id='.$customer->cust_id)?>"><span class="glyphicon glyphicon-pencil"></span></a>

                                <a class="delete-request" href="<?= Url::toRoute('/customer/delete?id='.$customer->cust_id)?>"><span class="glyphicon glyphicon-trash"></span></a>
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