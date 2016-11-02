<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Branches */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center><h1>Role</h1></center>
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
                            <td>Name</td>
                            <td><?= Html::encode("$model->name") ?></td>
                        </tr>

                        <tr style="font-size:large">
                            <td>Description</td>
                            <td><?= Html::encode("$model->description") ?></td>
                        </tr>

                        
              </table>
              <div style="margin:1%">
              <center>
                    <?= Html::a('Back', ['index'], ['class' =>'btn btn-default btn-lg']) ?>
                </center>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>