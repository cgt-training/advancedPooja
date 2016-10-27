<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Create Branches', ['create'], ['class' => 'btn btn-success']) ?> -->

        <!-- <?= Html::button('Create Branches', [
            'value'=> Url::toRoute('branches/create'), 
            'class' => 'btn btn-success', 
            'id'=>'create-request' ]) 
        ?> -->

    </p>

    <?php
            Modal::begin([

                'header'=>'<h2>Branches</h2>',
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
            // ['class' => 'yii\grid\SerialColumn'],

            'br_id',
            [ // this will display the company name instead of company id
                'attribute'=>'company_id',
                'value'=>'company.company_name',
            ],
            'br_name',
            'br_address',
            'br_created_date',
            // 'br_status',

            ['class' => 'yii\grid\ActionColumn', 
                'visibleButtons' => [
                    'update'=> function () {
                            return Yii::$app->user->can('updateCompany')?false:false;
                    },
                    'delete' => function () {
                            return Yii::$app->user->can('deleteCompany')?false:false;
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