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
$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row" style="margin-top:5%" id="index-content">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center>
                <h1 style="color:#3C8DBC">Users</h1>
              </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table-index" class="table table-responsive table-bordered table-hover">
                <thead style="font-size:large">
                    <tr style="color:#3C8DBC">
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Role</th>
                        <th>UserName</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usersList as $users): ?>
                        <tr style="font-size:large">
                            <td><?= Html::encode("$users->firstname") ?></td>
                            <td><?= Html::encode("$users->lastname") ?></td>
                            <td><?= Html::encode("$users->role") ?></td>
                            <td><?= Html::encode("$users->username") ?></td>
                            <td>
                                <a class="view-request" href="<?= Url::toRoute('/user/view?id='.$users->id)?>" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>

                                <a class="update-request" title='Update' href="<?= Url::toRoute('/user/update?id='.$users->id)?>"><span class="glyphicon glyphicon-pencil"></span></a>

                                <a class="delete-request" href="<?= Url::toRoute('/user/delete?id='.$users->id)?>"><span class="glyphicon glyphicon-trash"></span></a>
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