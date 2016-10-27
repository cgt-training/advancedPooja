<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Location */

$this->title = $model->loc_id;
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->loc_id], ['class' => 'btn btn-primary update-request']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->loc_id], [
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
            'loc_id',
            'zip_code',
            'city',
            'province',
        ],
    ]) ?>

</div>
