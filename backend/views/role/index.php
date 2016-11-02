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
$this->title = 'Roles';
$this->params['breadcrumbs'][] = ['label' => 'Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row" style="margin-top:5%">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <p class="pull-right">
              <?= Html::a('Add Role', ['create'], ['class' => 'btn btn-success btn-lg']) ?> 
              <?= Html::a('Add Permission', ['permission'], ['class' => 'btn btn-primary btn-lg']) ?>
            </p>
              <center>
                <h1>Roles</h1>
              </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead style="font-size:large">
                	<tr>
                  		<th>Name</th>
            			    <th>Description</th>
                      <th></th>
                	</tr>
                </thead>
                <tbody>
                	<?php foreach ($authitemdata as $data): ?>
			            <tr style="font-size:large">
			                <td><?= Html::encode("$data->name") ?></td>
			                <td><?= Html::encode("$data->description") ?></td>
                      <td><a data-method="post" class="" href="<?php echo Url::base()?>/role/delete?name=<?php echo $data->name ?>"><i class="fa fa-trash"></i></a></td>
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