<?php

use yii\helpers\Html;
use yii\helpers\BaseHtml;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
// use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
         <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?>
         <!-- <?= Html::button('Create Company', [
            'value'=> Url::toRoute('/company/create'), 
            'class' => 'btn btn-success', 
            'id'=>'create-request' ]) 
        ?> --> 
        

        <?= Html::a('View Company List', ['company-view'], ['class' => 'btn btn-primary']) ?>
    </p>
        <!-- <?php
            // Modal::begin([
            //     'header'=>'<h2>Company</h2>',
            //     'id'=>'create-modal',
            //     'size'=>'modal-lg',
            // ]);
            // echo "<div id='modalContent'></div>";
            // Modal::end();
        ?> -->
    
<div class="table-responsive">
    <?php Pjax::begin(['id' => 'formPjax']); ?>    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
            
                'company_id',
                'company_name',
                'company_email:email',
                'c_address',
                'c_createDate',
                 // 'company_status',
                [
                    'attribute' => 'company_logo',
                    'format' => 'html',
                    'value' => function ($dataProvider) {
                        return Html::img('@web/'.$dataProvider['company_logo'],
                            ['width' => '60px', 'class' => 'img-responsive']);
                    },
                ],
            
                 ['class' => 'yii\grid\ActionColumn',
                    'visibleButtons' => [
                        'update'=> function () {
                            return Yii::$app->user->can('updateCompany')?true:false;
                        },
                        'delete' => function () {
                            return Yii::$app->user->can('deleteCompany')?true:false;
                        },
                    ],
                    'buttons' => [
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url,['class'=>"delete-request"]);
                        },
                    ],
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?></div>
</div>