<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index">

    <div class="alert alert-info alert-dismissible" style="margin-top:5%;display: none" id="completed-message">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>Customer Created Successfully</h4>        
    </div>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Create Department', ['create'], ['class' => 'btn btn-success']) ?> -->
    <?= Html::button('Create Department', [
            'value'=> Url::toRoute('department/create'), 
            'class' => 'btn btn-success', 
            'id'=>'create-request' ]) 
        ?>
    </p>
        <?php
            Modal::begin([

                'header'=>'<h2>Departments</h2>',
                'id'=>'create-modal',
                'size'=>'modal-lg',
            ]);
            echo "<div id='modalContent'></div>";
            Modal::end();
        ?>

<?php Pjax::begin(['id' => 'formPjax']); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'dept_id',
            [ // this will display the branch name instead of branch id
                'attribute'=>'branch_id',
                'value'=>'branch.br_name',
            ],
            'dept_name',
            [ // this will display the company name instead of company id
                'attribute'=>'company_id',
                'value'=>'company.company_name',
            ],
            'dept_created_date',
            // 'dept_status',

            ['class' => 'yii\grid\ActionColumn', 
                // 'visibleButtons' => [
                //     'update'=> function () {
                //             return Yii::$app->user->can('updateCompany')?true:false;
                //     },
                //     'delete' => function () {
                //             return Yii::$app->user->can('deleteCompany')?true:false;
                //     },
                // ],
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url,['class'=>"delete-request"]);
                    },
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
