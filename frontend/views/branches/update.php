<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Branches */

$this->title = 'Update Branches: ' . $model->br_id;
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->br_id, 'url' => ['view', 'id' => $model->br_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="branches-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'companyList' => $companyList,
    ]) ?>

</div>
