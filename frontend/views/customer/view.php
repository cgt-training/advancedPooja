<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Customer */

$this->title = $model->cust_id;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view" style="color:#337AB7">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Update', ['update', 'id' => $model->cust_id], ['class' => 'btn btn-primary update-request']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cust_id], [
            'class' => 'btn btn-danger delete-request',
            // 'data' => [
            //     'confirm' => 'Are you sure you want to delete this item?',
            //     'method' => 'post',
            // ],
        ]) ?> -->
        <?= Html::a('Back', ['index'], ['class' =>'btn btn-default back_to_index']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cust_id',
            'cust_name',
            'zip_code',
            'city',
            'province',
        ],
    ]) ?>

</div>
