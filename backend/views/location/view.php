<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Location */

$this->title = $model->loc_id;
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center><h1>Branch Details</h1></center>
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
                            <td>Location Id</td>
                            <td><?= Html::encode("$model->loc_id") ?></td>
                        </tr>

                        <tr style="font-size:large">
                            <td>Zip Code</td>
                            <td><?= Html::encode("$model->zip_code") ?></td>
                        </tr>

                        <tr style="font-size:large">
                            <td>City</td>
                            <td><?= Html::encode("$model->city") ?></td>
                        </tr>

                        <tr style="font-size:large">
                            <td>Province</td>
                            <td><?= Html::encode("$model->province") ?></td>
                        </tr>
                </tbody>
              </table>
              <div style="margin:1%">
              <center>
                <?= Html::a('Update', ['update', 'id' => $model->loc_id], ['class' => 'btn btn-primary update-request']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->loc_id], [
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