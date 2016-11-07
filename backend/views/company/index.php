<?php

use yii\helpers\Html;
use yii\helpers\BaseHtml;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row" style="margin-top:5%">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center>
                <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success btn-lg pull-right']) ?>
                <h1 style="color:#3C8DBC">Companies</h1>
              </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table-index" class="table table-responsive table-bordered table-hover">
                <thead style="font-size:large">
                    <tr style="color:#3C8DBC">
                        <th>Company Name</th>
                        <th>Company Email</th>
                        <th>Company Address</th>
                        <th>Created Date</th>
                        <th>Company Logo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($companyList as $company): ?>
                        <tr style="font-size:large">
                            <td><?= Html::encode("$company->company_name") ?></td>
                            <td><?= Html::encode("$company->company_email") ?></td>
                            <td><?= Html::encode("$company->c_address") ?></td>
                            <td><?= Html::encode("$company->c_createDate") ?></td>
                            <td><?=Html::img(Url::base()."/$company->company_logo",
                                        ['width' => '60px']); ?></td>
                            <td>
                                <a class="view-request" href="<?= Url::toRoute('/company/view?id='.$company->company_id)?>" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>

                                <a class="update-request" title='Update' href="<?= Url::toRoute('/company/update?id='.$company->company_id)?>"><span class="glyphicon glyphicon-pencil"></span></a>

                                <a class="delete-request" href="<?= Url::toRoute('/company/delete?id='.$company->company_id)?>"><span class="glyphicon glyphicon-trash"></span></a>
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