<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <div class="alert alert-info alert-dismissible" style="margin-top:5%;display: none" id="completed-message">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>Customer Created Successfully</h4>        
    </div>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?> -->

        <?= Html::button('Create Customer', [
            'value'=> Url::toRoute('customer/create'), 
            'class' => 'btn btn-success', 
            'id'=>'create-request' ]) 
        ?>
    </p>

    <?php
            Modal::begin([

                'header'=>'<h2>Customer</h2>',
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

            'cust_id',
            'cust_name',
            'zip_code',
            'city',
            'province',

            ['class' => 'yii\grid\ActionColumn', 
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url,['class'=>"delete-request"]);
                    },
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
