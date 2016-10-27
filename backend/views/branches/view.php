<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Branches */

$this->title = $model->br_id;
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->br_id], ['class' => 'btn btn-primary update-request']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->br_id], [
            'class' => 'btn btn-danger delete-request',
            // 'data' => [
            //     'confirm' => 'Are you sure you want to delete this item?',
            //     'method' => 'post',
            // ],
        ]) ?>
        <?= Html::a('Back', ['index'], ['class' =>'btn btn-default back_to_index']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'br_id',
            'company_id',
            'br_name',
            'br_address',
            'br_created_date',
            'br_status',
        ],
    ]) ?>

</div>
