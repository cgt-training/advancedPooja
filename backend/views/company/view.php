<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Company */

$this->title = $model->company_id;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center><h1>Company Details</h1></center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead style="font-size:large">
                    <tr>
                        <th>Attributes</th>
                        <th>Values</th>
                    </tr>
                </thead>
                <tbody>
                        <tr style="font-size:large">
                            <td>Company Id</td>
                            <td><?= Html::encode("$model->company_id") ?></td>
                        </tr>

                        <tr style="font-size:large">
                            <td>Company Name</td>
                            <td><?= Html::encode("$model->company_name") ?></td>
                        </tr>

                        <tr style="font-size:large">
                            <td>Company E-Mail</td>
                            <td><?= Html::encode("$model->company_email") ?></td>
                        </tr>

                        <tr style="font-size:large">
                            <td>Company Address</td>
                            <td><?= Html::encode("$model->c_address") ?></td>
                        </tr>

                        <tr style="font-size:large">
                            <td>Created Date</td>
                            <td><?= Html::encode("$model->c_createDate") ?></td>
                        </tr>

                        <tr style="font-size:large">
                            <td>Status</td>
                            <td><?= Html::encode("$model->company_status") ?></td>
                        </tr>

                        <tr style="font-size:large">
                            <td>Company Logo</td>
                            <td><?= Html::img("@web/$model->company_logo", ['width' => '20%']) ?></td>
                        </tr>

              </table>
              <div style="margin:1%">
              <center>
                <?= Html::a('Update', ['update', 'id' => $model->company_id], ['class' => 'btn btn-primary update-request']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->company_id], [
                        'class' => 'btn btn-danger delete-request',
                        // 'data' => [
                        //     'confirm' => 'Are you sure you want to delete this item?',
                        //     'method' => 'post',
                        // ],
                    ]) ?>
                    <?= Html::a('Back', ['index'], ['class' =>'btn btn-default back_to_index']) ?>
                </center>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>