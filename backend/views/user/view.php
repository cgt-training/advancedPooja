<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center><h1>User Details</h1></center>
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
                <tbody style="font-size:large">
                        <tr>
                            <td>ID</td>
                            <td><?= Html::encode("$model->id") ?></td>
                        </tr>

                        <tr>
                            <td>FirstName</td>
                            <td><?= Html::encode("$model->firstname") ?></td>
                        </tr>

                        <tr>
                            <td>LastName</td>
                            <td><?= Html::encode("$model->lastname") ?></td>
                        </tr>

                        <tr>
                            <td>Role</td>
                            <td><?= Html::encode("$model->role") ?></td>
                        </tr>

                        <tr>
                            <td>UserName</td>
                            <td><?= Html::encode("$model->username") ?></td>
                        </tr>

                        <tr>
                            <td>AuthKey</td>
                            <td><?= Html::encode("$model->auth_key") ?></td>
                        </tr>

                        <tr>
                            <td>Password</td>
                            <td><?= Html::encode("$model->password") ?></td>
                        </tr>

                        <tr>
                            <td>Password Reset Token</td>
                            <td><?= Html::encode("$model->password_reset_token") ?></td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td><?= Html::encode("$model->email") ?></td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td><?= Html::encode("$model->status") ?></td>
                        </tr>

                        <tr>
                            <td>Created At</td>
                            <td><?= Html::encode("$model->created_at") ?></td>
                        </tr>

                        <tr>
                            <td>Updated At</td>
                            <td><?= Html::encode("$model->updated_at") ?></td>
                        </tr>
              </table>
              <div style="margin:1%">
              <center>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary update-request']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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