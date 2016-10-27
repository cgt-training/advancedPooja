<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Department */

$this->title = $model->dept_id;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dept_id], ['class' => 'btn btn-primary update-request']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dept_id], [
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
            'dept_id',
            'branch_id',
            'dept_name',
            'company_id',
            'dept_created_date',
            'dept_status',
        ],
    ]) ?>

</div>
