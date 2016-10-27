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
$this->title = 'Companies List';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Back', ['index'], ['class' =>'btn btn-default back_to_index']) ?>
    <table id="company-list-table">
        <tr style="font-size:x-large">
            <th>Company Name</th>
            <th>Company Logo</th>
        </tr>
        <?php foreach ($companyList as $company): ?>
            <tr style="font-size:large">
                <td><?= Html::encode("$company->company_name") ?></td>
                <td><?=Html::img("@web/frontend/web/$company->company_logo",
                            ['width' => '20%']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="pull-right">
        <?php echo LinkPager::widget([
            'pagination' => $pagination,
            ]); 
        ?>
    </div>
</div>